<?php

/**
 * panelHome actions.
 *
 * @package    smashintracks
 * @subpackage panelHome
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelHomeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
      $this->not_accepted = TracksPeer::getNotAcceptedTracks();
  }
}
