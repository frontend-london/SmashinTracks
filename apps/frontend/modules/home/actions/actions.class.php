<?php

/**
 * home actions.
 *
 * @package    smashintracks
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    //$recommended = TracksPeer::getRecommendedTracks();
      //$criteria = new Criteria();
      //$criteria->setLimit(10);
    $this->recommended = TracksRecommendsPeer::getActiveTracksRecommends();
    //exit();

    $this->newtracks = TracksPeer::getNewTracks(null, 10);
    $this->newtracks_genres = GenresPeer::getNewTracksGenres();

    $this->bestsellerstracks = TracksPeer::getBestsellersTracks(sfConfig::get('app_homepage_bestsellers_period'), 10);
  }
}
