<?php

/**
 * metadata actions.
 *
 * @package    smashintracks
 * @subpackage metadata
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class metadataActions extends sfActions
{

  public function executeSignOut(sfWebRequest $request)
  {
      Smashin::signOut();
      $this->redirect('homepage');
  }

  public function executeShowErrorPage(sfWebRequest $request)
  {

  }
}
