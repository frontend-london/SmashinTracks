<?php


/**
 * Skeleton subclass for performing query and update operations on the 'tracks' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:23
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TracksPeer extends BaseTracksPeer {

    static public function getActiveTracks(Criteria $criteria = null)
    {
        return self::doSelect(self::addActiveTracksCriteria($criteria));
    }

    static public function countActiveTracks(Criteria $criteria = null)
    {
        return self::doCount(self::addActiveTracksCriteria($criteria));
    }

    static public function countTodayUploadedTracks(Profiles $profile) {
        $criteria = new Criteria();
        $criteria->add(self::PROFILES_ID, $profile->getProfilesId());
        $criteria->add(self::TRACKS_DATE, '%'.date('Y-m-d').'%', Criteria::LIKE);//2011-03-18
        return self::doCount($criteria);
    }


    static public function addActiveTracksCriteria(Criteria $criteria = null)
    {
        if ($criteria === null) {
                $criteria = new Criteria(TracksPeer::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }

        $criteria->add(self::TRACKS_DELETED, false, Criteria::EQUAL);
        $criteria->add(self::TRACKS_ACCEPTED, true, Criteria::EQUAL);
        $criteria->add(ProfilesPeer::PROFILES_BLOCKED, false);
        $criteria->add(ProfilesPeer::PROFILES_DELETED, false);
        $criteria->addJoin(self::PROFILES_ID, ProfilesPeer::PROFILES_ID);
        return $criteria;
    }

    static public function doSelectActive(Criteria $criteria)
    {
        return self::doSelectOne(self::addActiveTracksCriteria($criteria));
    }

    static public function addNewTracksCriteria(Criteria $criteria = null, $amount = null) {

        if ($criteria === null) {
                $criteria = new Criteria(TracksPeer::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }

        $criteria->addDescendingOrderByColumn(TracksPeer::TRACKS_DATE);

        if($amount!=null) $criteria->setLimit($amount);

//        return self::getActiveTracks($criteria);
        return self::addActiveTracksCriteria($criteria);
    }

    static public function getNewTracks(Criteria $criteria = null, $amount = null) {
        
        return self::doSelect(self::addNewTracksCriteria($criteria, $amount));
    }

    static public function getNotAcceptedTracksCriteria(Criteria $criteria = null, $amount = null) {

        if ($criteria === null) {
                $criteria = new Criteria(TracksPeer::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }

        $criteria->addDescendingOrderByColumn(TracksPeer::TRACKS_DATE);
        if($amount!=null) $criteria->setLimit($amount);
        $criteria->add(self::TRACKS_ACCEPTED, false);
        $criteria->add(self::TRACKS_DELETED, false); // nie pokazuje usuniętych

        return $criteria;
    }

    static public function getNotAcceptedTracks(Criteria $criteria = null, $amount = null) {
        return self::doSelect(self::getNotAcceptedTracksCriteria($criteria, $amount));
    }

    static public function getBestsellersTracks($period = null, $amount = 30) {
        $criteria = new Criteria();
        $criteria->addJoin(TracksPeer::TRACKS_ID, TransactionsTracksPeer::TRACKS_ID);
        $criteria = TracksPeer::addActiveTracksCriteria($criteria);
        if($period!=null) {
            $criteria->addJoin(TransactionsTracksPeer::TRANSACTIONS_ID, TransactionsPeer::TRANSACTIONS_ID);
            $criteria->add(TransactionsPeer::TRANSACTIONS_DATE, time() - 86400 * $period, Criteria::GREATER_THAN);
        }
        $criteria->addGroupByColumn(TracksPeer::TRACKS_ID);
        $criteria->addDescendingOrderByColumn('COUNT('.TracksPeer::TRACKS_ID.')'); // sortowanie po ilości tracków sprzedanych
        $criteria->addDescendingOrderByColumn(TracksPeer::TRACKS_DATE); // w przypadku gdy ilość  sprzedanych tracków jest taka sama
        $criteria->setLimit($amount);
        $tracks = TracksPeer::doSelect($criteria);
        return $tracks;
        //getTransactionsTrackss
        
    }

    static public function getTracksIn($set, $order = null) {
        $criteria = self::addActiveTracksCriteria();
        $criteria->add(self::TRACKS_ID, $set, Criteria::IN);
        if(isset($order)) {
            $criteria->addAscendingOrderByColumn($order);
        } else {
            $criteria->addAscendingOrderByColumn('FIND_IN_SET('.self::TRACKS_ID.",'".implode(',', $set). "')");
        }
        $tracks = TracksPeer::doSelect($criteria);
        return $tracks;
    }

    static public function getBasketTracks(Basket $basket) {
        $tracks_ids = $basket->getTracksIds();
        $tracks = self::getTracksIn($tracks_ids);
        return $tracks;
    }

    static public function getWishlistTracks(Wishlist $wishlist) {
        $tracks_ids = $wishlist->getTracksIds();
        $tracks = self::getTracksIn($tracks_ids);
        return $tracks;
    }

    static public function getWishlistTracksOrderByArtist(Wishlist $wishlist) {
        $tracks_ids = $wishlist->getTracksIds();
        $tracks = self::getTracksIn($tracks_ids, TracksPeer::TRACKS_PATH);
        return $tracks;
    }

    public static function getTrackById($tracks_id, $criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->add(self::TRACKS_ID, $tracks_id);
        return self::doSelectOne($criteria);
    }

    public static function getSearchTracksCriteria($keyword) {
        $keyword = Smashin::PHP_slashes($keyword);
        $keyword = trim($keyword);
        $keyword = strtr($keyword, array(' ' => '%'));
        $keyword = '%'.$keyword.'%';
        $criteria = self::addActiveTracksCriteria();
        $where = '('.self::TRACKS_TITLE." LIKE '$keyword' OR ".self::TRACKS_ARTIST." LIKE '$keyword')";
        $criteria->add(self::TRACKS_TITLE, $where, Criteria::CUSTOM);
        return $criteria;
    }
    
    public static function getTracksIdGroupCount($c) {
        $copy = clone $c;
        $copy->addGroupByColumn(self::TRACKS_ID);
        return self::doCount($copy);
    }

} // TracksPeer
