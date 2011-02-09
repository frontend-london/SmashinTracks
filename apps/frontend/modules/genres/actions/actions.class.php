<?php

/**
 * genres actions.
 *
 * @package    smashintracks
 * @subpackage genres
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class genresActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeShow(sfWebRequest $request)
  {
//    $this->genres = GenresPeer::retrieveByPk($request->getParameter('genres_id'));
    
    
    $this->genres = $this->getRoute()->getObject();

    $genre_criteria = new Criteria();
    $genre_criteria->addDescendingOrderByColumn(TracksPeer::TRACKS_DATE);
    $this->tracks = $this->genres->getTracksGenressJoinTracks($genre_criteria);//->getTracks();
    $genresRandomNumbers = array();
    $genresMaxId = Smashin::getMaxId(GenresPeer::GENRES_ID, GenresPeer::TABLE_NAME);
    for($i=1; $i<20;$i++) { // do wygenerowania X gatunków, zabezpieczenie gdyby któryś id nie istniał, dodać do config
        $rand = rand(1, $genresMaxId);
        if($rand!=$this->genres->getGenresId()) { // by nie proponowało siebie
            $genresRandomNumbers[] = $rand;
        }
    }
    // na podstawie: http://www.titov.net/2005/09/21/do-not-use-order-by-rand-or-how-to-get-random-rows-from-table/
    $seeAlsoCriteria = new Criteria();
    $seeAlsoCriteria->add(GenresPeer::GENRES_ID, $genresRandomNumbers, Criteria::IN);
    $seeAlsoCriteria->addAscendingOrderByColumn('RAND()');
    $seeAlsoCriteria->setLimit(7); // ma wyświetlać X gatunków, dodać do config
    $this->seeAlsoGenres = GenresPeer::doSelect($seeAlsoCriteria);

    


    

    
//    $this->forward404Unless($this->genres);
  }  
}
