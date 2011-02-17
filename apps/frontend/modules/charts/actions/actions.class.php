<?php

/**
 * charts actions.
 *
 * @package    smashintracks
 * @subpackage charts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chartsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeNewTracks(sfWebRequest $request) {
    //$this->newtracks = TracksPeer::getNewTracks();

    $this->pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $this->pager->setCriteria(TracksPeer::addNewTracksCriteria());
    $this->pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request) {
    $period = $this->getRequestParameter('period');
    $this->subsection = $this->getRequestParameter('subsection');
    //echo $subsection;
    $this->tracks = TracksPeer::getBestsellersTracks($period, 30);
    
  }

}
