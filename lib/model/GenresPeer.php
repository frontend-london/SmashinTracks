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



} // GenresPeer
