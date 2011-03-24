<?php

/**
 * membersMyProfile actions.
 *
 * @package    smashintracks
 * @subpackage membersMyProfile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membersMyProfileActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $profile = ProfilesPeer::getCurrentProfile();

    $this->url_edit_id = $this->getUser()->getFlash('url_edit_id');
    $this->getUser()->setFlash('url_edit_id', null);



    $form = new MyProfileForm(array('profiles_text' => $profile->getProfilesText()));

    if ($request->isMethod('post') && $request->hasParameter('profile'))
    {
        $form->bind($request->getParameter('profile'), $request->getFiles('profile'));
        if ($form->isValid())
        {
            $profile->setProfilesText($form->getValue('profiles_text'));
            $profile->save();

            
            $file = $form->getValue('profiles_photo');
            $filename_upload = sfConfig::get('sf_upload_profiles_dir').DIRECTORY_SEPARATOR.$profile->getProfilesPath().'_'.date('U').$file->getExtension($file->getOriginalExtension());
            $filename_target_big = sfConfig::get('sf_images_profiles_big_dir').DIRECTORY_SEPARATOR.$profile->getProfilesPath().'.jpg';
            $filename_target_small = sfConfig::get('sf_images_profiles_small_dir').DIRECTORY_SEPARATOR.$profile->getProfilesPath().'.jpg';
            $file->save($filename_upload);

            $thumbnail_big = new sfThumbnail(220, 220);
            $thumbnail_big->loadFile($filename_upload);
            $thumbnail_big->save($filename_target_big, 'image/jpeg');
            unset($thumbnail_big);

            $thumbnail_small = new sfThumbnail(40, 40, false);
            $thumbnail_small->loadFile($filename_upload);
            $thumbnail_small->save($filename_target_small, 'image/jpeg');
            unset($thumbnail_small);


  



        }
    }
    $this->form = $form;
    $this->profile = $profile;

  }


  public function executeUrlEdit(sfWebRequest $request)
  {
      $url_edit = $this->getRoute()->getObject();
      $this->getUser()->setFlash('url_edit_id', $url_edit->getProfilesUrlsId());


      //$form = new MyProfileUrlEditForm();




      $this->forward('membersMyProfile', 'show');
  }

  public function executeUrlDelete(sfWebRequest $request)
  {
    $this->forward('membersMyProfile', 'show');
  }

}
