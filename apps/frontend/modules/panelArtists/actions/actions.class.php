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
    $pager = new sfPropelPager('Profiles',sfConfig::get('app_max_tracks_on_list'));
    $pager->setCriteria(ProfilesPeer::getActiveProfilesOrderByDateCriteria());
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
  }

  public function executeShowAlphabetically(sfWebRequest $request)
  {
    $this->artists = ProfilesPeer::getActiveProfilesAscending();
  }

  public function executeAcceptBlocked(sfWebRequest $request)
  {
    $profile = $this->getRoute()->getObject();
    $profile->setProfilesBlocked(false);
    $profile->save();
    $this->redirect('panel_artists_blocked');
  }

  public function executeAcceptBlockedAlphabetically(sfWebRequest $request)
  {
    $profile = $this->getRoute()->getObject();
    $profile->setProfilesBlocked(false);
    $profile->save();
    $this->redirect('panel_artists_blocked_alphabetically');
  }

  public function executeDeleteBlocked(sfWebRequest $request)
  {
    $profile = $this->getRoute()->getObject();
    $profile->setProfilesDeleted(true);
    $profile->save();
    $this->redirect('panel_artists_blocked');
  }

  public function executeDeleteBlockedAlphabetically(sfWebRequest $request)
  {
    $profile = $this->getRoute()->getObject();
    $profile->setProfilesDeleted(true);
    $profile->save();
    $this->redirect('panel_artists_blocked_alphabetically');
  }

  public function executeShowBlocked(sfWebRequest $request)
  {
    $pager = new sfPropelPager('Profiles',sfConfig::get('app_max_tracks_on_list'));
    $pager->setCriteria(ProfilesPeer::getBlockedProfilesOrderByDateCriteria());
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
  }

  public function executeShowBlockedAlphabetically(sfWebRequest $request)
  {
    $this->artists = ProfilesPeer::getBlockedProfilesAscending();
  }
}
