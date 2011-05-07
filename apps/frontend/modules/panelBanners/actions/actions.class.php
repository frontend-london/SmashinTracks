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

    $this->banners_top = $banners_top;
    $this->banners_side = $banners_side;
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
