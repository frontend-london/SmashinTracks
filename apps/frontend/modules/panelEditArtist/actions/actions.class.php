<?php

/**
 * panelEditArtist actions.
 *
 * @package    smashintracks
 * @subpackage panelEditArtist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelEditArtistActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $this->url_edit_id = $this->getUser()->getFlash('url_edit_id'); 
    $this->getUser()->setFlash('url_edit_id', null);
    if(empty($this->url_edit_id)) {
        $tmp_pr = $request->getParameter('profile');
        $this->url_edit_id = $tmp_pr['profiles_url_edit_id'];
        $profile = $this->getRoute()->getObject();
    } else {
        $url_edit = ProfilesUrlsPeer::getProfilesUrlsById($this->url_edit_id);
        $profile = $url_edit->getProfiles();
    }
    $form = new EditProfileForm(array('profiles_id' => $profile->getProfilesId(), 'profiles_name' => $profile->getProfilesName(), 'profiles_text' => $profile->getProfilesText(), 'profiles_email' => $profile->getProfilesEmail(), 'profiles_photo_delete' => false));
    $this->added_url = false;

    if ($request->isMethod('post') && $request->hasParameter('profile'))
    {
        $form->bind($request->getParameter('profile'), $request->getFiles('profile'));
        if ($form->isValid())
        {
            if($form->getValue('profiles_url_add_action')) { // tylko pole do dodania linka
                if(($form->getValue('profiles_url_add')!='')) {
                    $url = new ProfilesUrls();
                    $url->setProfiles($profile);
                    $url->setProfilesUrlsUrl($form->getValue('profiles_url_add'));
                    $url->save();
                    $this->added_url = true;
                }
            } elseif($form->getValue('profiles_url_edit_action')) { // tylko pole do edycji linka
                $this->url_edit_id = null;
                $url_id = $form->getValue('profiles_url_edit_id');
                $url = ProfilesUrlsPeer::getProfilesUrlsById($url_id);
                if($url->getProfilesId()==ProfilesPeer::getCurrentProfileId()) {
                    $url->setProfilesUrlsUrl($form->getValue('profiles_url_edit'));
                    $url->save();
                }
            } else {
                $profile->setProfilesName($form->getValue('profiles_name'));
                $profile->setProfilesText($form->getValue('profiles_text'));
                $profile->setProfilesEmail($form->getValue('profiles_email'));


                if($form->getValue('profiles_photo_delete')) {
                    $profile->setProfilesPhoto(false);
                }

                $file = $form->getValue('profiles_photo');
                if(is_object($file)) {
                    $profile->setProfilesPhoto(true);
                }

                $profile->save();

                if(is_object($file)) { // musi być po - potrzebny ProfilesId
                    $filename_upload = sfConfig::get('sf_upload_profiles_dir').DIRECTORY_SEPARATOR.$profile->getProfilesId().'_'.$profile->getProfilesPath().'_'.date('U').$file->getExtension($file->getOriginalExtension());
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
        }
    }

    $this->form = $form;
    $this->profile = $profile;
  }

  public function executeUrlEdit(sfWebRequest $request)
  {
      $url_edit = $this->getRoute()->getObject();
      $this->getUser()->setFlash('url_edit_id', $url_edit->getProfilesUrlsId());
      $this->forward('panelEditArtist', 'show');
  }

  public function executeUrlDelete(sfWebRequest $request)
  {
    $url_delete = $this->getRoute()->getObject();
    $profile = $url_delete->getProfiles();
    $url_delete->delete();
    $this->redirect('panel_edit-artist', $profile);

  }

  public function executeBlock(sfWebRequest $request)
  {
      $profile = $this->getRoute()->getObject();
      $profile->setProfilesBlocked(true);
      $profile->save();
      $this->redirect('homepage');
  }

  public function executeDelete(sfWebRequest $request)
  {
      $profile = $this->getRoute()->getObject();
      $profile->setProfilesDeleted(true);
      $profile->save();
      $this->redirect('homepage');
  }

}
