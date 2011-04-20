<?php

/**
 * panelHome actions.
 *
 * @package    smashintracks
 * @subpackage panelHome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelHomeActions extends sfActions
{

  public function executeAccept(sfWebRequest $request)
  {
    $track = $this->getRoute()->getObject();
    $track->setTracksAccepted(true);
    $track->save();
    $this->redirect('panel_home');
  }
  
  public function executeDisapprove(sfWebRequest $request)
  {
    $track = $this->getRoute()->getObject();
    $track->setTracksDeleted(true);
    $track->save();
    $this->redirect('panel_home');
  }

  public function executeShow(sfWebRequest $request)
  {
      $this->not_accepted = TracksPeer::getNotAcceptedTracks(null, 10);
  }
}
