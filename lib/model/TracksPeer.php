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
        //$criteria->addDescendingOrderByColumn(self::CREATED_AT);

        return $criteria;
    }

    static public function doSelectActive(Criteria $criteria)
    {
        return self::doSelectOne(self::addActiveTracksCriteria($criteria));
    }

} // TracksPeer
