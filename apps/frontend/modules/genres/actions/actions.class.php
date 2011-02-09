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
    $this->tracks = $this->genres->getTracksGenressJoinTracksDescending();
    $this->seeAlsoGenres = GenresPeer::getRandomGenres($this->genres);


//    $this->forward404Unless($this->genres);
  }  
}
