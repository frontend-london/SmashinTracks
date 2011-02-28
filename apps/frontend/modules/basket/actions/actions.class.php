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

  public function executePayPalExpressCheckout(sfWebRequest $request) {
        $cc = new prestaPaypal( sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'prestaPaypalPlugin'.DIRECTORY_SEPARATOR.'sdk'.DIRECTORY_SEPARATOR.'lib' );
        //echo sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'prestaPaypalPlugin'.DIRECTORY_SEPARATOR.'sdk'.DIRECTORY_SEPARATOR.'lib'."\n";

        // Setup API's credentials
            // Your PayPal ID or an email address associated with your PayPal account. Email addresses must be confirmed.
        //echo sfConfig::get('app_paypal_username').'ss';
        $cc->setUserName(sfConfig::get('app_paypal_username'));
        $cc->setPassword(sfConfig::get('app_paypal_password'));
            // API signature
            // How to get a signature ? https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_api_NVPAPIBasics
        $cc->setSignature(sfConfig::get('app_paypal_signature'));
            // Usefull in development environment
        $cc->setTestMode(sfConfig::get('mod_registration_paypal_test'));

        //sfApplicationConfiguration::loadHelpers(array('Url'));
        //sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));
        // A URL to which the payer's browser is redirected if payment is cancelled
        //$cc->setCancelURL(url_for('basket', true));
        $cc->setCancelURL($this->generateUrl('basket', array(), true));
        //$this->generateUrl('basket', true)

        // The URL to which the payer's browser is redirected after completing the payment
        //$cc->setReturnURL(url_for('basket_paypal_checkout', true));
        $cc->setReturnURL($this->generateUrl('basket_paypal_checkout', array(), true));
        

            // Amount payement incl. taxes
        $cc->setTransactionTotal('39.95');
        $cc->setTransactionDescription('Registration');
//if(!$cc->chargeExpressCheckout($token)) $this->errormessage = $cc->getErrorString();

        // The express url well-formed
        $goto = $cc->GetExpressUrl();
        if ( $goto )
        {
                //$this->redirect($goto);
                $this->redirect($goto.'&useraction=commit');
        }
        else
        {
                return $this->renderText('Error: ' . $cc->getErrorString());
        }      
  }

/*public function executePaypalConfirm(sfWebRequest $request)
  {
    $this->forward404Unless($token = $request->getParameter('token'));
    $basket = BasketPeer::getUserBasket();
    $cc = new prestaPaypal();
    $cc->setUserName(sfConfig::get('mod_order_paypal_user'));
    $cc->setPassword(sfConfig::get('mod_order_paypal_password'));
    $cc->setSignature(sfConfig::get('mod_order_paypal_signature'));
    $cc->setTestMode(sfConfig::get('mod_order_paypal_test'));
    $cc->setTransactionTotal(round($basket->getTotalValue()/100,2));
    if(!$cc->chargeExpressCheckout($token)) $this->errormessage = $cc->getErrorString();
    $basket->setCheckedOut(1);
    $basket->save();
    }
*/

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
