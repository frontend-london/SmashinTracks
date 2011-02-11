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

  }

  public function executeShowAll(sfWebRequest $request)
  {
    $artistCriteria = new Criteria();
    /*$artistCriteria->clearSelectColumns();
    $artistCriteria->addSelectColumn(ProfilesPeer::PROFILES_NAME);
    $artistCriteria->addSelectColumn(ProfilesPeer::PROFILES_PATH);
    $artistCriteria->addSelectColumn(ProfilesPeer::PROFILES_TEXT);*/
    //$artistCriteria->setDistinct();
    $artistCriteria->addAscendingOrderByColumn(ProfilesPeer::PROFILES_NAME);
    $this->artists = ProfilesPeer::doSelect($artistCriteria);
  }
}
