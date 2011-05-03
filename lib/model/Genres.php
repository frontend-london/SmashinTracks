<?php


/**
 * Skeleton subclass for representing a row from the 'genres' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:21
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Genres extends BaseGenres {

    public function getTracksGenressJoinTracksDescending($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN) {
        if ($criteria === null) {
                $criteria = new Criteria(GenresPeer::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->addDescendingOrderByColumn(TracksPeer::TRACKS_DATE);
        return self::getTracksGenressJoinTracks($criteria, $con, $join_behavior);
    }



    public function countNewActiveTracks() {
        $criteria = new Criteria();
        $criteria->add(TracksPeer::TRACKS_DATE, time() - 86400 * sfConfig::get('app_track_new_period'), Criteria::GREATER_THAN);
        $criteria->add(TracksGenresPeer::GENRES_ID, $this->getGenresId());
        $criteria->addJoin(TracksPeer::TRACKS_ID, TracksGenresPeer::TRACKS_ID);
        return TracksPeer::countActiveTracks($criteria);
        //return self::countTracksGenress($criteria, true);
    }

    public function getActiveTracksCriteria($criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria(ProfilesPeer::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }

        $criteria->add(TracksGenresPeer::GENRES_ID, $this->getGenresId());
        $criteria->addJoin(TracksPeer::TRACKS_ID, TracksGenresPeer::TRACKS_ID);
        return TracksPeer::addActiveTracksCriteria($criteria);
    }

    public function getActiveTracksCriteriaOrderByDate() {
        $criteria = new Criteria();
        $criteria->addDescendingOrderByColumn(TracksPeer::TRACKS_DATE);
        return $this->getActiveTracksCriteria($criteria);
    }
    
    /*
     * Generuje unikalny URL
     */
    public function generateGenresPath($string) {
        $path_size = GenresPeer::getTableMap()->getColumn(GenresPeer::GENRES_PATH)->getSize();
        $path = Smashin::generate_url($string, $path_size);
        $counter=1;
        while(true) {
            $criteria = new Criteria(GenresPeer::DATABASE_NAME);
            if($this->getGenresId()) $criteria->add(GenresPeer::GENRES_ID, $this->getGenresId(), Criteria::ALT_NOT_EQUAL);
            $criteria->add(GenresPeer::GENRES_PATH, $path);
            if(GenresPeer::doSelectOne($criteria)) {
                $add_end = '-'.$counter;
                $path = Smashin::generate_url($string, $path_size-strlen($add_end)).$add_end;
                $counter++;
            } else break;
        }
        return $path;

    }

    public function save(PropelPDO $con = null)
    {
        $path = $this->generateGenresPath($this->getGenresName());
        $this->setGenresPath($path);

        return parent::save($con);
    }

    

} // Genres
