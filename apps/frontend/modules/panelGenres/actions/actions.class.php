<?php

/**
 * panelGenres actions.
 *
 * @package    smashintracks
 * @subpackage panelGenres
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelGenresActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
      $this->panel_genres_alert = $this->getUser()->getFlash('panel_genres_alert', false);


      $this->genres_first = GenresPeer::getGenresFirstHalf();
      $this->genres_second = GenresPeer::getGenresSecondHalf();
  }

  public function executeEdit(sfWebRequest $request)
  {

  }

  public function executeDelete(sfWebRequest $request)
  {
    $genres = $this->getRoute()->getObject();
    $tracks_genress = $genres->getTracksGenress();

    if(empty($tracks_genress)) {
        $genres->delete();
    } else {
        $this->getUser()->setFlash('panel_genres_alert', true); // wyświetli komunikat o błędzie - niepusty gatunek
    }
    
    $this->redirect('panel_genres');
  }
}
