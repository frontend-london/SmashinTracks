<?php

/**
 * panelBanners actions.
 *
 * @package    smashintracks
 * @subpackage panelBanners
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelBannersActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $banners_top = BannersPeer::getBanners(1);
    $banners_side = BannersPeer::getBanners(2);
    $banner_top_edit_error = false;
    $banner_side_edit_error = false;

    if($request->getParameter('subsection')=='banners-edit') {
        $active_banner = $this->getRoute()->getObject();
    } else {
        $active_banner = null;
    }

    if($request->getParameter('banners_top_edit_id')) {
        $banner_edit_id = (int)$request->getParameter('banners_top_edit_id');
        $banner_top_edit_url = $request->getParameter('banners_top_edit_url');
        $this->banner_top_edit_url = $banner_top_edit_url;
        $banner_top_edit = BannersPeer::getBannersById($banner_edit_id);
        $urlValidator = new sfValidatorUrlHttp(array('required' => false), array('invalid'  => 'Invalid URL.'));
        try {
            $url = $urlValidator->clean($banner_top_edit_url);
            $banner_top_edit->setBannersUrl($url);
            $banner_top_edit->save();
        } catch(sfValidatorError $e) {
            $active_banner = $banner_top_edit;
            $banner_top_edit_error = true;
            $this->banner_top_edit_error_message = $e->getMessage();
        }
        
    } elseif($request->getParameter('banners_side_edit_id')) {
        $banner_edit_id = (int)$request->getParameter('banners_side_edit_id');
        $banner_side_edit_url = $request->getParameter('banners_side_edit_url');
        $this->banner_side_edit_url = $banner_side_edit_url;
        $banner_side_edit = BannersPeer::getBannersById($banner_edit_id);
        $urlValidator = new sfValidatorUrlHttp(array('required' => false), array('invalid'  => 'Invalid URL.'));
        try {
            $url = $urlValidator->clean($banner_side_edit_url);
            $banner_side_edit->setBannersUrl($url);
            $banner_side_edit->save();
        } catch(sfValidatorError $e) {
            $active_banner = $banner_side_edit;
            $banner_side_edit_error = true;
            $this->banner_side_edit_error_message = $e->getMessage();
        }

    }

    if($request->getParameter('form_banners_top_send') && !$request->getParameter('banners_top_edit_action')) {
        $banners_top_active = $request->getParameter('banners_top_active');
        foreach($banners_top as $banner) {
            $active = (int)$request->getParameter('banners_top_active_'.$banner->getBannersId());
            $banner->setBannersActive($active);
            $banner->save();
        }

        $file = $request->getFiles('banners_top_image');
        if($file['size']) {
            $banner = new Banners();
            $path = Smashin::generate_random_pass(32);
            $banner->setBannersPath($path);
            $banner->setBannersType(1);
            $banner->save();
            $filename_upload = sfConfig::get('sf_images_banners_dir').DIRECTORY_SEPARATOR.$path.'.jpg';
            $thumbnail = new sfThumbnail(460, 70, false);
            $thumbnail->loadFile($file['tmp_name']);
            $thumbnail->save($filename_upload, 'image/jpeg');
            unset($thumbnail);

            $banners_top = BannersPeer::getBanners(1); // zresetowanie - bo doszedł nowy obiekt
        }


    }

    if($request->getParameter('form_banners_side_send') && !$request->getParameter('banners_side_edit_action')) {
        $banners_side_active = $request->getParameter('banners_side_active');
        foreach($banners_side as $banner) {
            $active = (int)$request->getParameter('banners_side_active_'.$banner->getBannersId());
            $banner->setBannersActive($active);
            $banner->save();
        }

        $file = $request->getFiles('banners_side_image');
        if($file['size']) {
            $banner = new Banners();
            $path = Smashin::generate_random_pass(32);
            $banner->setBannersPath($path);
            $banner->setBannersType(2);
            $banner->save();
            $filename_upload = sfConfig::get('sf_images_banners_dir').DIRECTORY_SEPARATOR.$path.'.jpg';
            $thumbnail = new sfThumbnail(192, 123, false);
            $thumbnail->loadFile($file['tmp_name']);
            $thumbnail->save($filename_upload, 'image/jpeg');
            unset($thumbnail);

            $banners_side = BannersPeer::getBanners(2); // zresetowanie - bo doszedł nowy obiekt
        }
    }



    $this->banners_top = $banners_top;
    $this->banners_side = $banners_side;
    $this->active_banner = $active_banner;
    $this->banner_top_edit_error = $banner_top_edit_error;
    $this->banner_side_edit_error = $banner_side_edit_error;
  }

  public function executeDelete(sfWebRequest $request) {
    $banner = $this->getRoute()->getObject();
    $banner->delete();
    $this->redirect('panel_banners');
  }

  public function executeChangeOrder(sfWebRequest $request) {
    $banner = $this->getRoute()->getObject();

    $second_banners_id = $request->getParameter('second_banners_id');
    $second_banner = BannersPeer::getBannersById($second_banners_id);
    $this->forward404Unless(is_object($second_banner));

    $banner_order = $banner->getBannersOrder();
    $second_banner_order = $second_banner->getBannersOrder();


    $banner->setBannersOrder($second_banner_order);
    $second_banner->setBannersOrder($banner_order);

    $banner->save();
    $second_banner->save();
    $this->redirect('panel_banners');


  }

}
