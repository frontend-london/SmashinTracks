<?php

/**
 * membersUploadTrack actions.
 *
 * @package    smashintracks
 * @subpackage membersUploadTrack
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membersUploadTrackActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
//      $profile = ProfilesPeer::getCurrentProfile();
      $form = new TracksForm();
//      print_r(GenresPeer::getGenresNames());
      if ($request->isMethod('post') && $request->hasParameter('tracks'))
      {
        $form->bind($request->getParameter('tracks'), $request->getFiles('tracks'));
        if ($form->isValid())
        {

        }
      }
      $this->form = $form;
  }
}
