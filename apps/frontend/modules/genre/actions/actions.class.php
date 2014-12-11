<?php

/**
 * genres actions.
 *
 * @package    smashintracks
 * @subpackage genre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class genreActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */ 
  public function executeShow(sfWebRequest $request)
  {
    $subsection = $this->getRequestParameter('subsection');      
    $this->subsection = $subsection;
    $this->ajaxType = $this->getRequestParameter('ajax');
    $this->genres = $this->getRoute()->getObject();
    $this->seeAlsoGenres = GenresPeer::getRandomGenres($this->genres);
    $pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $pager->setPeerCountMethod('getTracksIdGroupCount');
    if($subsection=='all_tracks') {
        $pager->setCriteria($this->genres->getActiveTracksCriteriaOrderByDate());    
        $route_name = 'genre';
    } elseif($subsection=='bestsellers') {
        $pager->setCriteria($this->genres->getActiveTracksCriteriaOrderBySale());
        $route_name = 'genre_bestsellers';
    } else { // best_rated
        $pager->setCriteria($this->genres->getActiveTracksCriteriaOrderByRate());    
        //$pager->setCriteria($this->genres->getActiveTracksCriteriaOrderByDate());    
        $route_name = 'genre_best-rated';
    }
    
    
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
    $this->route_name = $route_name;
  }  
}