<?php   
  class metadataComponents extends sfComponents   
  {   
    
    public function executeMenuleft(sfWebRequest $request)   
    {   
      $this->menuleft = GenresPeer::getGenres();
      $this->genre_path = $this->getRequestParameter('genres_path');

      $this->isAdmin = ProfilesPeer::isAdminProfile();
      $this->tracks_amount = TracksPeer::countActiveTracks();
      $this->profiles_amount = ProfilesPeer::countActiveProfiles();
    }

    public function executeMainmenu(sfWebRequest $request)
    {
      $this->isAdmin = ProfilesPeer::isAdminProfile();
    }

    public function executeFlashplayer(sfWebRequest $request)
    {
      $this->isAdmin = ProfilesPeer::isAdminProfile();
    }

    public function executeSubmenu(sfWebRequest $request)
    {
      $this->isProfile = ProfilesPeer::isCurrentProfile();
      $this->isAdmin = ProfilesPeer::isAdminProfile();
      $this->profile = ProfilesPeer::getCurrentProfile();
    }

    public function executeBannertop(sfWebRequest $request)
    {
        $this->banner = BannersPeer::getRandBanner(1);
    }

    public function executeBannersside(sfWebRequest $request)
    {
        $this->banners = BannersPeer::getBannersSide();
    }

    public function executeBasketsales(sfWebRequest $request)
    {

      $isBasket = ($request->getParameter('section')=='basket');
      $isAdmin = ProfilesPeer::isAdminProfile();
      if($isAdmin) {
          $this->day_tracks = TransactionsPeer::getTracksSoldTodayAmount();
          $this->day_profit = TransactionsPeer::getTracksSoldTodayProfit();
          $this->month_tracks = TransactionsPeer::getTracksSoldThisMonthAmount();
          $this->month_profit = TransactionsPeer::getTracksSoldThisMonthProfit();
      } else { 
          $oUser = $this->getUser();
          if($oUser->hasAttribute('basket')) {
            $basket = $oUser->getAttribute('basket');
            $basket->setProfile(ProfilesPeer::getCurrentProfileId());
          } else {
            $basket = new Basket(ProfilesPeer::getCurrentProfileId());
          }
          $tracks = TracksPeer::getBasketTracks($basket);
          $this->emptyBasket = (sizeof($tracks)==0);
          $this->basketPrize = Smashin::generate_prize(sizeof($tracks)*sfConfig::get('app_default_prize'));
          $this->tracks = $tracks;
      }
      $this->isAdmin = $isAdmin;
      $this->isBasket = $isBasket;
    }

    public function executeLoginbox(sfWebRequest $request)
    {
     $this->form = new LoginForm();

     if ($request->isMethod('post') && $request->hasParameter('login'))
     {
       $this->form->bind($request->getParameter('login'));
       
       if ($this->form->isValid())
       {
           $profile = ProfilesPeer::getProfileIfLoginCorrect($this->form->getValue('email'), $this->form->getValue('password'));
           $remember_me = $this->form->getValue('remember_me');
           Smashin::signIn($profile, $remember_me);
           if($profile->isAdmin()) {
//              $this->redirect('panel_home');
              $this->getContext()->getActionStack()->getLastEntry()->getActionInstance()->redirect('panel_home');
           } else {
              $this->getContext()->getActionStack()->getLastEntry()->getActionInstance()->redirect('homepage');
           }
           
       }
     }
  }

    public function executeRecord(sfWebRequest $request)
    {
      $this->isAdmin = ProfilesPeer::isAdminProfile();
    }
}  