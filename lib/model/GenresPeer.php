<?php


/**
 * Skeleton subclass for performing query and update operations on the 'genres' table.
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
class GenresPeer extends BaseGenresPeer {

	public static function getRandomGenres(Genres $obj = null, PropelPDO $con = null)
	{
            $genresRandomNumbers = array();
            $genresMaxId = Smashin::getMaxId(self::GENRES_ID, self::TABLE_NAME);
            for($i=1; $i<sfConfig::get('app_genres_see_also_rand')*2;$i++) { // do wygenerowania X gatunków, zabezpieczenie gdyby któryś id nie istniał
                $rand = rand(1, $genresMaxId);
                if(($obj!=null) && ($rand!=$obj->getGenresId())) { // by nie proponowało siebie
                    $genresRandomNumbers[] = $rand;
                }
            }
            // na podstawie: http://www.titov.net/2005/09/21/do-not-use-order-by-rand-or-how-to-get-random-rows-from-table/
            $seeAlsoCriteria = new Criteria();
            $seeAlsoCriteria->add(self::GENRES_ID, $genresRandomNumbers, Criteria::IN);
            $seeAlsoCriteria->addAscendingOrderByColumn('RAND()');
            $seeAlsoCriteria->setLimit(sfConfig::get('app_genres_see_also_rand')); // ma wyświetlać X gatunków
            return self::doSelect($seeAlsoCriteria);
	}

        public static function getGenresNames() {
            $criteria = new Criteria();
            $criteria->addSelectColumn(self::GENRES_NAME);
            $r = self::doSelectStmt($criteria);
            return $r->fetchAll(PDO::FETCH_COLUMN);
        }

        public static function getNewTracksGenres() {
            $tracks = TracksPeer::getNewTracks();
            $tracks_genres = array();
            foreach($tracks as $track) {
                $genres = $track->getTracksGenress();
                foreach($genres as $genre) {
                    if(!empty($tracks_genres[$genre->getGenresId()])) $tracks_genres[$genre->getGenresId()]++; else $tracks_genres[$genre->getGenresId()] = 1;
                }
            }
            arsort ($tracks_genres); // sortowanie od największego

            $counter = 0;
            $genres_ids = array();
            foreach($tracks_genres as $genre_key => $genre_value) {
                $counter++;
                if($counter>sfConfig::get('app_homepage_genres_new_tracks')) break;
                $genres_ids[] = $genre_key; // wydobycie największych kluczy
            }

            $criteria = new Criteria();
            $criteria->add(GenresPeer::GENRES_ID, $genres_ids, Criteria::IN);
            $genres_objects = GenresPeer::doSelect($criteria);

            return $genres_objects;
        }

        public static function getGenreByName($name) {
            $criteria = new Criteria();
            $criteria->add(self::GENRES_NAME, $name);
            return self::doSelectOne($criteria);
        }

        public static function getGenreById($id = null) {
            if($id == null) return null;
            $criteria = new Criteria();
            $criteria->add(self::GENRES_ID, $id);
            return self::doSelectOne($criteria);
        }

        public static function getGenres($criteria = null) {
            if ($criteria === null) {
                    $criteria = new Criteria(self::DATABASE_NAME);
            }
            elseif ($criteria instanceof Criteria)
            {
                    $criteria = clone $criteria;
            }
            $criteria->addAscendingOrderByColumn(self::GENRES_NAME);
            return self::doSelect($criteria);
        }

        public static function getGenresFirstHalf() {
            $criteria = new Criteria();
            $amount = GenresPeer::doCount($criteria);
            $half = ceil($amount/2);
            $criteria->setLimit($half);
            return self::getGenres($criteria);
        }

        public static function getGenresSecondHalf() {
            $criteria = new Criteria();
            $amount = GenresPeer::doCount($criteria);
            $half = ceil($amount/2);
            $criteria->setOffset($half);
            return self::getGenres($criteria);
        }



} // GenresPeer
