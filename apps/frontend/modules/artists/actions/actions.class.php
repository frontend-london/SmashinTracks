<?php

/**
 * artists actions.
 *
 * @package    smashintracks
 * @subpackage artists
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class artistsActions extends sfActions
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
    $this->ajaxType = $this->getRequestParameter('ajax');
    $this->artists = ProfilesPeer::getMostPopularProfiles();
  }

  public function executeShowAll(sfWebRequest $request)
  {
    $this->ajaxType = $this->getRequestParameter('ajax');
    $this->artists = ProfilesPeer::getActiveProfilesWithTracksAscending();
  }
}
