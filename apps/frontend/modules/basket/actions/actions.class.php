<?php

/**
 * basket actions.
 *
 * @package    smashintracks
 * @subpackage basket
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class basketActions extends sfActions
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
    $transaction->setProfilesId(ProfilesPeer::getCurrentProfileId()); // id lub null
    $transaction->save();

    $oUser->setAttribute('transaction_id',$transaction->getTransactionsId());
    $this->transaction = $transaction;
    $this->tracks = TracksPeer::getBasketTracks($basket);
    $this->prize = Smashin::generate_prize(count($this->tracks)*sfConfig::get('app_default_prize'));

  }

  public function executeAdd(sfWebRequest $request) {
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();
    $isAjax = $request->isXmlHttpRequest();

    if($oUser->hasAttribute('basket')) {
        $basket = $oUser->getAttribute('basket');
        $basket->setProfile(ProfilesPeer::getCurrentProfileId());
    } else {
        $basket = new Basket(ProfilesPeer::getCurrentProfileId());
    }
    $basket->addTrack($track->getTracksId());
    $oUser->setAttribute('basket',$basket);

    if($isAjax) {
        $this->setLayout(false);
        return sfView::NONE;
    } else {
        $this->redirect('basket');
    }
  }

  public function executeRemove(sfWebRequest $request) {
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();
    $isAjax = $request->isXmlHttpRequest();

    if($oUser->hasAttribute('basket')) {
        $basket = $oUser->getAttribute('basket');
        $basket->setProfile(ProfilesPeer::getCurrentProfileId());
    } else {
        $basket = new Basket(ProfilesPeer::getCurrentProfileId());
    }
    $basket->removeTrack($track->getTracksId());
    $oUser->setAttribute('basket',$basket);

    if($isAjax) {
        $this->setLayout(false);
        return sfView::NONE;
    } else {
        $this->redirect('basket');
    }
  }

  public function executePayPalCheckout(sfWebRequest $request) {

      $transaction = $this->getRoute()->getObject();
      if($transaction->getTransactionsDone()) {
        $tx = $request->getParameter('tx');
        if($transaction->getTransactionsPaypalTxnid()!=$tx) $this->forward404(); // zabezpieczenie przed nieuprawnionym dostępem
        
        $oUser = $this->getUser();
        if($oUser->hasAttribute('basket')) {
            $basket = $oUser->getAttribute('basket');
            $basket->setProfile(ProfilesPeer::getCurrentProfileId());
        } else {
            $basket = new Basket(ProfilesPeer::getCurrentProfileId());
        }
        
        foreach ($transaction->getTransactionsTrackssJoinTracks() as $transaction_track) {
            $track = $transaction_track->getTracks();
            $basket->removeTrack($track->getTracksId());
        }
        $oUser->setAttribute('basket',$basket);
        $transaction_new = new Transactions();
        
        $transaction_new->setTransactionsDate('now');
        $transaction_new->setProfilesId(ProfilesPeer::getCurrentProfileId()); // id lub null
        $transaction_new->save();
        
        $oUser->setAttribute('transaction_id',$transaction_new->getTransactionsId());
       
        $this->transaction = $transaction;
        
        return sfView::SUCCESS;
      } else {
        return sfView::ERROR;
      }
      
  }

  public function executeDownload() {

  }


}
