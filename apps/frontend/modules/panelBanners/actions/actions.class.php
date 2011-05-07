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

//    foreach($banners_top as $banner) {
//
//    }

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
