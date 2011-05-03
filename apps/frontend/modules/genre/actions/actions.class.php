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
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->genres = $this->getRoute()->getObject();
    $this->seeAlsoGenres = GenresPeer::getRandomGenres($this->genres);
    $pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $pager->setCriteria($this->genres->getActiveTracksCriteriaOrderByDate());
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
  }  
}