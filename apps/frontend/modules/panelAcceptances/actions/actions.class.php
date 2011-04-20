<?php

/**
 * panelAcceptances actions.
 *
 * @package    smashintracks
 * @subpackage panelAcceptances
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelAcceptancesActions extends sfActions
{

  public function executeAccept(sfWebRequest $request)
  {
    $track = $this->getRoute()->getObject();
    $track->setTracksAccepted(true);
    $track->save();
    $this->redirect('panel_acceptances');
  }

  public function executeDisapprove(sfWebRequest $request)
  {
    $track = $this->getRoute()->getObject();
    $track->setTracksDeleted(true);
    $track->save();
    $this->redirect('panel_acceptances');
  }

  public function executeShow(sfWebRequest $request)
  {
    $pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
    $pager->setCriteria(TracksPeer::getNotAcceptedTracksCriteria());
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();

    $this->pager = $pager;
  }
}
