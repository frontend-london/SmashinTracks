<?php

/**
 * order actions.
 *
 * @package    smashintracks
 * @subpackage order
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class orderActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $transaction = $this->getRoute()->getObject();
    $this->forward404Unless($transaction->getTransactionsDone());
    if($request->getParameter('registered')) {
        if(!ProfilesPeer::getCurrentProfileId()) $this->forward404(); // strona tylko dla zalogowanych
        if($transaction->getProfilesId()!=ProfilesPeer::getCurrentProfileId()) $this->redirect ('members_my-downloads');
    }
    if(!$transaction->isTransactionActive()) $this->redirect ('members_my-downloads');
    $this->transaction = $transaction;
    $this->tracks = $transaction->getTransactionsTrackssJoinTracks();
    $this->profile = ProfilesPeer::getCurrentProfile();
    
  }
}
