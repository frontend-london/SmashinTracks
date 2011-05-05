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

  public function executeShow(sfWebRequest $request)
  {
    $profile = $this->getRoute()->getObject();
    $profile->addStats();
    
    $pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $pager->setCriteria($profile->getActiveTracksCriteriaOrderByDate());
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();

    $this->profile = $profile;
    $this->pager = $pager;
    $this->isAdmin = ProfilesPeer::isAdminProfile();
  }
}
