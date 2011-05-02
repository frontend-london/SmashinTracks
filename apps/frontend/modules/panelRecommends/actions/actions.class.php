<?php

/**
 * panelRecommends actions.
 *
 * @package    smashintracks
 * @subpackage panelRecommends
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelRecommendsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $this->active_recommends = TracksRecommendsPeer::getActiveTracksRecommends();
    $this->inactive_recommends = TracksRecommendsPeer::getInactiveTracksRecommends();
  }
}
