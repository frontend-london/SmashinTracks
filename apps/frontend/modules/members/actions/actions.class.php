<?php

/**
 * members actions.
 *
 * @package    smashintracks
 * @subpackage members
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membersActions extends sfActions
{

  /**
   * Wersja dla zalogowanych - Members Homepage
   *
   * @param sfWebRequest $request A request object
   */
  public function executeShow(sfWebRequest $request) {
     $this->profile = ProfilesPeer::getCurrentProfile();
     $this->withdraw_complete_message = $this->getUser()->getFlash('withdraw_complete_message', false); // wyświetla komunikat OK..
  }

  public function executeMySales(sfWebRequest $request) {
    $profile = ProfilesPeer::getCurrentProfile();
    $transactions = $profile->getAllTransactions();
//    echo $profile->getProfilesSalesInformInstantly(); exit();
    $form = new SalesEmailForm(array('on_sale' => (bool)$profile->getProfilesSalesInformInstantly(), 'daily' => (bool)$profile->getProfilesSalesInformDaily(), 'weekly' => (bool)$profile->getProfilesSalesInformWeekly()));
    
    if ($request->isMethod('post')) {
        $form->bind($request->getParameter('sales_email'));
        if ($form->isValid()) {
            $on_sale = $form->getValue('on_sale');
            $daily = $form->getValue('daily');
            $weekly = $form->getValue('weekly');
            
            $profile->setProfilesSalesInformInstantly($on_sale);
            $profile->setProfilesSalesInformDaily($daily);
            $profile->setProfilesSalesInformWeekly($weekly);
            $profile->save();
        }
    }     
    
    
    $pager = new myArrayPager(null, sfConfig::get('app_max_transactions_on_list'));
    $pager->setResultArray($transactions);
    $pager->setPage($this->getRequestParameter('page',1));
    $pager->init();

    $this->pager = $pager;
    $this->profile = $profile;
    $this->form = $form;

  }

  public function executeMyTracks(sfWebRequest $request) {
    $profile = ProfilesPeer::getCurrentProfile();
    $subsection = $this->getRequestParameter('subsection');
    $in_wishlists = false;
    if($subsection=='all_tracks') {
        $tracks = $profile->getTrackss($profile->getActiveTracksCriteriaOrderByDate());
    } elseif($subsection=='most_popular') {
        $tracks = $profile->getTrackss($profile->getActiveTracksCriteriaOrderByPopular());
    } else { // in_wishlists
        $tracks = $profile->getTrackss($profile->getActiveTracksCriteriaOrderByInWishlists());
        $in_wishlists = true;
    }
    $tracks_count = $profile->countTrackssActive();

    $this->profile = $profile;
    $this->tracks = $tracks;
    $this->tracks_count = $tracks_count;
    $this->subsection = $subsection;
    $this->in_wishlists = $in_wishlists;
  }
  
  public function executeMyTracksRemove(sfWebRequest $request) {
//      exit();
    $subsection = $this->getRequestParameter('subsection');
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();    
    /*@var $track Tracks */
    if($track->getProfilesId()==$oUser->getAttribute('profile_id')) {
        $track->setTracksDeleted(1);
        $track->save();
    }
    
    if($subsection=='most_popular') {
      $this->redirect('members_my-tracks_most_popular');
    } elseif($subsection=='in_wishlists') {
      $this->redirect('members_my-tracks_in_wishlists');
    } else {
      $this->redirect('members_my-tracks');
    }    
  }

  public function executeMyDownloads(sfWebRequest $request) {
      $profile = ProfilesPeer::getCurrentProfile();
      $transactions = $profile->getTransactionssActiveOrderByDate();
      $this->transactions = $transactions;
  }

  public function executeMyWishlist(sfWebRequest $request) {
    $subsection = $this->getRequestParameter('subsection');
    $oUser = $this->getUser();
    if($oUser->hasAttribute('wishlist')) {
        $wishlist = $oUser->getAttribute('wishlist');
        $wishlist->setProfile(ProfilesPeer::getCurrentProfileId());
    } else {
        $wishlist = new Wishlist(ProfilesPeer::getCurrentProfileId());
    }
    
    if($subsection=='last_added') {
        $this->tracks = TracksPeer::getWishlistTracks($wishlist);
    } else { // By Artists
        $this->tracks = TracksPeer::getWishlistTracksOrderByArtist($wishlist);
    }
    $this->subsection = $subsection;
  }

  public function executeMyWishlistAdd(sfWebRequest $request) {
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();
    $isAjax = $request->isXmlHttpRequest();

    if($oUser->hasAttribute('wishlist')) {
        $wishlist = $oUser->getAttribute('wishlist');
        $wishlist->setProfile(ProfilesPeer::getCurrentProfileId());
    } else {
        $wishlist = new Wishlist(ProfilesPeer::getCurrentProfileId());
    }
    $wishlist->addTrack($track->getTracksId());
    $oUser->setAttribute('wishlist',$wishlist);
    
    if($isAjax) {
        $this->setLayout(false);
        return sfView::NONE;
    } else {
        $this->redirect('members_my-wishlist');
    }
  }

  public function executeMyWishlistRemove(sfWebRequest $request) {
    $subsection = $this->getRequestParameter('subsection');
    $track = $this->getRoute()->getObject();
    $oUser = $this->getUser();
    $isAjax = $request->isXmlHttpRequest();
    if($oUser->hasAttribute('wishlist')) {
        $wishlist = $oUser->getAttribute('wishlist');
        $wishlist->setProfile(ProfilesPeer::getCurrentProfileId());
    } else {
        $wishlist = new Wishlist(ProfilesPeer::getCurrentProfileId());
    }
    $wishlist->removeTrack($track->getTracksId());
    $oUser->setAttribute('wishlist',$wishlist);
    
    if($isAjax) {
      $this->setLayout(false);
      return sfView::NONE;
    } elseif($subsection=='by_artist') {
      $this->redirect('members_my-wishlist_by_artist');
    } else {
      $this->redirect('members_my-wishlist');
    }

  }
  
}
