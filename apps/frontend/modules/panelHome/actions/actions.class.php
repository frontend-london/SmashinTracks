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

  public function executeDeleteTrack(sfWebRequest $request)
  {
    $track = $this->getRoute()->getObject();
    $track->setTracksDeleted(1);
    $track->save();
    $profile = $track->getProfiles();
    $this->redirect('profile', $profile);
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
    $this->last_sold_trancations = TransactionsPeer::getLastDoneTransactions(10);

    $this->recommended = TracksRecommendsPeer::getActiveTracksRecommends();

    $this->newtracks = TracksPeer::getNewTracks(null, 10);
    $this->newtracks_genres = GenresPeer::getNewTracksGenres();

    $this->bestsellerstracks = TracksPeer::getBestsellersTracks(sfConfig::get('app_homepage_bestsellers_period'), 10);
  }
}
