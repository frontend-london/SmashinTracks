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
    $this->transaction = $this->getRoute()->getObject();
    $this->forward404Unless($this->transaction->getTransactionsDone());
    $this->tracks = $this->transaction->getTransactionsTrackssJoinTracks();
    $this->profile = ProfilesPeer::getCurrentProfile();
  }
}
