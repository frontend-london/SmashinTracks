<?php

/**
 * search actions.
 *
 * @package    smashintracks
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
        $keyword = $request->getParameter('k');

//        $tracks = TracksPeer::getSearchTracksCriteria($keyword);

        $pager = new sfPropelPager('Tracks',sfConfig::get('app_max_tracks_on_list'));
        $pager->setCriteria(TracksPeer::getSearchTracksCriteria($keyword));
        $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
        $pager->init();

        $this->keyword = $keyword;
        $this->pager = $pager;

        if(!$pager->count()) return sfView::ERROR;
//        $this->tracks = $tracks;
//        echo $keyword.' sss';
//      return sfView::ERROR;
  }
}
