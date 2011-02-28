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
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeShow(sfWebRequest $request)
  {
    $oUser = $this->getUser();
    if($oUser->hasAttribute('basket')) {
        $basket = $oUser->getAttribute('basket');
    } else {
        $basket = new Basket();
    }
    $this->tracks = TracksPeer::getBasketTracks($basket);
    $this->prize = Smashin::generate_prize(count($this->tracks)*sfConfig::get('app_default_prize'));

    if($oUser->hasAttribute('transaction')) {
        $this->transaction = $oUser->getAttribute('transaction');
        $this->transaction->setTransactionsDate('now');
        $this->transaction->save();
    } else {
        $this->transaction = new Transactions();
        $this->transaction->setTransactionsDate('now');
        $this->transaction->save();
        $oUser->setAttribute('transaction',$this->transaction);
    }

  }

  public function executeAdd(sfWebRequest $request) {
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();
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
