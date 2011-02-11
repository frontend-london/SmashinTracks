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
    $this->track = $this->getRoute()->getObject();
    $this->profile = $this->track->getProfiles();

    $this->pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $this->pager->setCriteria($this->profile->getActiveTracksCriteriaOrderByDate());
    $this->pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $this->pager->init();
  }
}
