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
    $this->tracks = $this->transaction->getTransactionsTrackssJoinTracks();
  }

  public function executeDownload(sfWebRequest $request)
  {
    $transaction_track = $this->getRoute()->getObject();
    //$this->tracks = $this->transaction->getTransactionsTrackssJoinTracks();

    //$this->redirect('http://'.$_SERVER['SERVER_NAME'].$request->getRelativeUrlRoot().'/mp3/download/'.$transaction_track->getTracksPath().'.mp3');

header('Content-type: audio/mp3');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="downloaded.mp3"');

// The PDF source is in original.pdf
readfile('web/mp3/download/'.$transaction_track->getTracksPath().'.mp3');
exit();
  }
}
