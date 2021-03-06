<?php

/**
 * track actions.
 *
 * @package    smashintracks
 * @subpackage track
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trackActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
    $track = $this->getRoute()->getObject();
    $isAdmin = ProfilesPeer::isAdminProfile();
    $this->forward404Unless($isAdmin || $track->isTrackActive());

    $this->profile = $track->getProfiles();

    $this->pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $criteria = new Criteria();
    $criteria = $this->profile->getActiveTracksCriteriaOrderByDate();
    $criteria->add(TracksPeer::TRACKS_ID, $track->getTracksId(), Criteria::ALT_NOT_EQUAL);
    $this->pager->setCriteria($criteria);
    $this->pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $this->pager->init();

    $this->track = $track;
    $this->isAdmin = $isAdmin;
  }
  
  public function executeVote(sfWebRequest $request)
  {
    $track = $this->getRoute()->getObject();
      
    $track->addVote(ProfilesPeer::getCurrentProfileId());        
    $isAjax = $request->isXmlHttpRequest();

      
    if($isAjax) {
        $this->setLayout(false);
        echo $track->getVotesCount();
        return sfView::NONE;
    } else {
        $this->redirect('track', $track);
    }      
      
      
      
      
      
  }  
}
