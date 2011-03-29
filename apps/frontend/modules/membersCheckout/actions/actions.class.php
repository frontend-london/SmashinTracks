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



    $form = new MembersCheckoutForm();

    if ($request->isMethod('post') && $request->hasParameter('checkout'))
    {
        $form->bind($request->getParameter('checkout'));
        if ($form->isValid())
        {
            /*$withdraw = new Withdraws();
            $withdraw->setProfiles($profile);
            $withdraw->setWithdrawsPaypalAddress($form->getValue('email'));
            $withdraw->setWithdrawsDate(date('U'));
            $withdraw->setWithdrawsSaldoValue($profile->getProfilesBalance());
            $withdraw->save();
            $profile->setProfilesBalance(0);
            $profile->save();*/




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

            /*
             * pobrać basket, dodać do saldo i tracks itd, dodać zabezpiecenie gdy nie ma środków
             */








            //echo 't';
            $this->getUser()->setFlash('order_complete', true);
            $this->getUser()->setFlash('profile_balance', $this->profile_balance);
            $this->getUser()->setFlash('basket_prize', $this->basket_prize);
            $this->getUser()->setFlash('new_balance', $this->new_balance);
            $this->redirect('members_checkout_complete');
        }
    }
    $this->form = $form;


  }

  public function executeComplete(sfWebRequest $request)
  {
    $order_complete = $this->getUser()->getFlash('order_complete', false); // powinno przyjąć true

    $oUser = $this->getUser();

    if($oUser->hasAttribute('transaction_id')) {
        $transaction_id = $oUser->getAttribute('transaction_id');
        $transaction = TransactionsPeer::getTransactionById($transaction_id);
        if(!$transaction->getTransactionsDone()) $order_complete = false;
    } else {
        $order_complete = false;
    }


    if($order_complete) {
        $this->profile_balance = $this->getUser()->getFlash('profile_balance');
        $this->basket_prize = $this->getUser()->getFlash('basket_prize');
        $this->new_balance = $this->getUser()->getFlash('new_balance');
        $this->transaction = $transaction;

        /* NIE ZMIENIA STRONY PO NACISNIECIU F5: */
        $this->getUser()->setFlash('order_complete', true);
        $this->getUser()->setFlash('profile_balance', $this->profile_balance);
        $this->getUser()->setFlash('basket_prize', $this->basket_prize);
        $this->getUser()->setFlash('new_balance', $this->new_balance);
    } else {
        $this->redirect('basket');
    }

  }
}
