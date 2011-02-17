<?php


/**
 * Skeleton subclass for performing query and update operations on the 'tracks_recommends' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:24
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TracksRecommendsPeer extends BaseTracksRecommendsPeer {

    public static function getRecommendedTracks($criteria = null) {
        if ($criteria === null) {
            $criteria = new Criteria(TracksPeer::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->addDescendingOrderByColumn(TracksRecommendsPeer::TRACKS_RECOMMENDS_ORDER);
        $criteria->add(TracksRecommendsPeer::TRACKS_RECOMMENDS_ACTIVE, true);
        $criteria->setLimit(10);
        return self::doSelect($criteria);
    }
} // TracksRecommendsPeer
