<?php

/**
 * panelArtists actions.
 *
 * @package    smashintracks
 * @subpackage panelArtists
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelArtistsActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
//    $this->artists = ProfilesPeer::getProfilesOrderByDate();

    $pager = new sfPropelPager('Profiles',sfConfig::get('app_max_tracks_on_list'));
    $pager->setCriteria(ProfilesPeer::getProfilesOrderByDateCriteria());
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
  }
}
