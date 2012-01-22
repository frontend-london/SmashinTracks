<?php

/**
 * membersCheckout actions.
 *
 * @package    smashintracks
 * @subpackage membersCheckout
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membersCheckoutActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $oUser = $this->getUser();
    
    if($oUser->hasAttribute('basket')) {
        $basket = $oUser->getAttribute('basket');
        $basket->setProfile(ProfilesPeer::getCurrentProfileId());
    } else {
        $basket = new Basket(ProfilesPeer::getCurrentProfileId());
    }

    $profile = ProfilesPeer::getCurrentProfile();
    $tracks = TracksPeer::getBasketTracks($basket);
    $this->profile_balance = $profile->getProfilesBalanceText();
    $this->basket_prize = Smashin::generate_prize(count($tracks)*sfConfig::get('app_default_prize'));
    $this->new_balance = Smashin::generate_prize($profile->getProfilesBalanceReal()-(count($tracks)*sfConfig::get('app_default_prize')));
    $this->new_balance_prize = $profile->getProfilesBalanceReal()-(count($tracks)*sfConfig::get('app_default_prize'));



    $form = new MembersCheckoutForm();

    if ($this->new_balance_prize >=0 && $request->isMethod('post') && $request->hasParameter('checkout'))
    {
        $form->bind($request->getParameter('checkout'));
        if ($form->isValid())
        {
            if($oUser->hasAttribute('transaction_id')) {
                $transaction_id = $oUser->getAttribute('transaction_id');
                $transaction = TransactionsPeer::getTransactionById($transaction_id);
                if($transaction->getTransactionsDone()) {
                    $transaction = new Transactions();
                }
            } else {
                $transaction = new Transactions();
            }

            $transaction->setTransactionsDate('now');
            $transaction->setTransactionsDone(true);
            $transaction->setProfilesId(ProfilesPeer::getCurrentProfileId());
            $transaction->setTransactionsPaymethod(2); // 2 - przez ST
            $transaction->save();
            $oUser->setAttribute('transaction_id',$transaction->getTransactionsId());

            $admin_profile = ProfilesPeer::getAdminProfile();

            foreach($tracks as $track) {
                $transaction_track = new TransactionsTracks();
                $transaction_track->setTransactions($transaction);
                $transaction_track->setTracks($track);
                $transaction_track->setTransactionsTracksPath(Smashin::generate_random_pass(32));
                $transaction_track->save();
                
                $basket->removeTrack($track->getTracksId());

                /* kupujący */
                $transactions_saldo[1] = new TransactionsSaldo();
                $transactions_saldo[1]->setTransactionsTracks($transaction_track);
                $transactions_saldo[1]->setProfiles($profile);
                $transactions_saldo[1]->setTransactionsSaldoValue(-Smashin::generate_default_prize_int());
                $transactions_saldo[1]->save();

                $profile->setProfilesBalance($profile->getProfilesBalance()-Smashin::generate_default_prize_int());

                /* sprzedawca */
                $transactions_saldo[2] = new TransactionsSaldo();
                $transactions_saldo[2]->setTransactionsTracks($transaction_track);
                $transactions_saldo[2]->setProfilesId($track->getProfilesId());
                $transactions_saldo[2]->setTransactionsSaldoValue(Smashin::generate_default_prize_int()/2);
                $transactions_saldo[2]->save();

                $seller_profile = $track->getProfiles();
                $seller_profile->setProfilesBalance($seller_profile->getProfilesBalance()+(Smashin::generate_default_prize_int()/2));
                $seller_profile->save();


                /* admin */
                $transactions_saldo[3] = new TransactionsSaldo();
                $transactions_saldo[3]->setTransactionsTracks($transaction_track);
                $transactions_saldo[3]->setProfilesId(sfConfig::get('app_admin_profile_id'));
                $transactions_saldo[3]->setTransactionsSaldoValue(Smashin::generate_default_prize_int()/2);
                $transactions_saldo[3]->save();

                $admin_profile->setProfilesBalance($admin_profile->getProfilesBalance()+(Smashin::generate_default_prize_int()/2));
                
            }

            $profile->save();
            $admin_profile->save();
            
            $transaction_new = new Transactions();
            $transaction_new->setTransactionsDate('now');
            $transaction_new->setProfilesId(ProfilesPeer::getCurrentProfileId()); // id lub null
            $transaction_new->save();

            $oUser->setFlash('order_complete', true);
            $oUser->setFlash('transaction_id', $transaction->getTransactionsId());
            $oUser->setFlash('profile_balance', $this->profile_balance);
            $oUser->setFlash('basket_prize', $this->basket_prize);
            $oUser->setFlash('new_balance', $this->new_balance);
            $oUser->setAttribute('basket',$basket);
            $oUser->setAttribute('transaction_id',$transaction_new->getTransactionsId());
            
            $b = new sfWebBrowser();
            $b->get('http://smashintracks.com/notify/30RorgH84wNT4X72Mn/instantly_inner.php?id='.$transaction_id); // wywolanie powiadomien email
            
            $this->redirect('members_checkout_complete');
        }
    }
    $this->form = $form;


  }

  public function executeComplete(sfWebRequest $request)
  {
    $oUser = $this->getUser();

    $order_complete = $oUser->getFlash('order_complete', false); // powinno przyjąć true
    
    $transaction_id = $oUser->getFlash('transaction_id', false); // powinno przyjąć wartość transaction_id

    $this->getLogger()->alert('Order complete '.(int)$order_complete);

    $this->getLogger()->alert('transaction_id get'.$transaction_id);

    if($transaction_id) {
        $transaction = TransactionsPeer::getTransactionById($transaction_id);
        if(!$transaction->getTransactionsDone()) $order_complete = false;
    } else {
        $order_complete = false;
    }


    if($order_complete) {
        $this->profile_balance = $oUser->getFlash('profile_balance');
        $this->basket_prize = $oUser->getFlash('basket_prize');
        $this->new_balance = $oUser->getFlash('new_balance');
        $this->transaction = $transaction;

        /* NIE ZMIENIA STRONY PO NACISNIECIU F5: */
        $oUser->setFlash('order_complete', true);
        $oUser->setFlash('transaction_id', $transaction_id);
        $oUser->setFlash('profile_balance', $this->profile_balance);
        $oUser->setFlash('basket_prize', $this->basket_prize);
        $oUser->setFlash('new_balance', $this->new_balance);
    } else {
        $this->redirect('basket');
    }

  }
}
