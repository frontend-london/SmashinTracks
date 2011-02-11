<?php

/**
 * profile actions.
 *
 * @package    smashintracks
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->profile = $this->getRoute()->getObject();
    
    $this->pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $this->pager->setCriteria($this->profile->getActiveTracksCriteriaOrderByDate());
    $this->pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $this->pager->init();
  }
}
