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
    } else {
        $basket = new Basket();
    }

    if($oUser->hasAttribute('transaction_id')) {
        $transaction_id = $oUser->getAttribute('transaction_id');
        $transaction = TransactionsPeer::getTransactionById($transaction_id);
        if($transaction->getTransactionsDone()) {
            $this->logMessage('Basket before '.print_r($basket->getTracksIds(), true), 'alert');
            $this->logMessage('Transaction'.print_r($transaction, true), 'alert');
            $this->logMessage('Transaction tracks'.print_r($transaction->getTransactionsTrackssJoinTracks(), true), 'alert');
            foreach ($transaction->getTransactionsTrackssJoinTracks() as $transaction_track) {
                $track = $transaction_track->getTracks();
                $this->logMessage('Remove track '.$track->getTracksId(), 'alert');
                $basket->removeTrack($track->getTracksId());
            }
            $this->logMessage('Basket after '.print_r($basket->getTracksIds(), true), 'alert');
            $oUser->setAttribute('basket',$basket);
            $transaction = new Transactions();
        }
        $transaction->setTransactionsDate('now');
        $transaction->save();
    } else {
        $transaction = new Transactions();
        $transaction->setTransactionsDate('now');
        $transaction->save();
        $oUser->setAttribute('transaction_id',$transaction->getTransactionsId());
    }
    $this->transaction = $transaction;
    $this->tracks = TracksPeer::getBasketTracks($basket);
    $this->prize = Smashin::generate_prize(count($this->tracks)*sfConfig::get('app_default_prize'));

  }

  public function executeAdd(sfWebRequest $request) {
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();
/*  wersja dla zalogowanych
 *     if($oUser->hasAttribute('basket_id')) {
        $basket_id = $oUser->getAttribute('basket_id');
        $basket = ProfilesBasketsPeer::getProfilesBasketsById($basket_id);
 */
    if($oUser->hasAttribute('basket')) {
        $basket = $oUser->getAttribute('basket');
    } else {
        $basket = new Basket();
    }
    $basket->addTrack($track->getTracksId());
    $oUser->setAttribute('basket',$basket);
    $this->redirect('basket');
    //$this->forward('basket', 'show');
  }

  public function executeRemove(sfWebRequest $request) {
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();
    if($oUser->hasAttribute('basket')) {
        $basket = $oUser->getAttribute('basket');
    } else {
        $basket = new Basket();
    }
    $basket->removeTrack($track->getTracksId());
    $oUser->setAttribute('basket',$basket);
    $this->redirect('basket');
    //$this->forward('basket', 'show');
  }

  public function executePayPalCheckout(sfWebRequest $request) {
      $this->transaction = $this->getRoute()->getObject();
      if($this->transaction->getTransactionsDone()) {
        return sfView::SUCCESS;
      } else {
        return sfView::ERROR;
      }
      
      /*
      $tx = $request->getParameter('tx'); // Transaction ID/PDT token np. 0VE68616NX111264S
      $st = $request->getParameter('st'); // Transaction status np. Completed
      if($st!='Completed') $this->redirect404 ();
      $amt = $request->getParameter('amt'); // Amount of the transaction np. 0.02
      $cc = $request->getParameter('cc'); // Currency code np. GB
      $cm = $request->getParameter('cm'); // Custom message np. nic
      $criteria = new Criteria();
      $criteria->add(PaypalCartInfoPeer::TXNID, $tx);
      $items = PaypalCartInfoPeer::doSelect($criteria);
      $tracks_id = array();
      foreach($items as $item) {
          $tracks_id[] = $item->getItemnumber();
      }
      //print_r($tracks_id);
      $tracks = TracksPeer::getTracksIn($tracks_id);

      $criteria = new Criteria();
      $criteria->add(PaypalPaymentInfoPeer::TXNID, $tx);
      $info = PaypalPaymentInfoPeer::doSelectOne($criteria);
      //$paymentdate = $info->getPaymentdate();
      if($info->getMcGross()!=count($items)*sfConfig::get('app_default_prize')) $this->redirect404 (); // test na dobrą wartość zapłaty
      */
  }

  public function executeDownload() {

  }


}
