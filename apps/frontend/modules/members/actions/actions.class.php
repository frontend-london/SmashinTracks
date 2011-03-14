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
  }

  public function executeMySales(sfWebRequest $request) {
    $profile = ProfilesPeer::getCurrentProfile();
    $transactions = $profile->getAllTransactions();
    
    $pager = new myArrayPager(null, sfConfig::get('app_max_transactions_on_list'));
    $pager->setResultArray($transactions);
    $pager->setPage($this->getRequestParameter('page',1));
    $pager->init();

    $this->pager = $pager;
    $this->profile = $profile;

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
}
