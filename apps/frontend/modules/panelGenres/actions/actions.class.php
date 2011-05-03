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

    private $genre = null;

  public function executeShow(sfWebRequest $request)
  {
    $this->panel_genres_alert = $this->getUser()->getFlash('panel_genres_alert', false);

    $this->genres_first = GenresPeer::getGenresFirstHalf();
    $this->genres_second = GenresPeer::getGenresSecondHalf();

    $this->genre_obj = $this->getUser()->getFlash('genre', null);
    if(is_object($this->genre_obj)) {
        $form = new GenresForm($this->genre_obj); // tmp
    } else {
        $form = new GenresForm();
    }

    if ($request->isMethod('post') && $request->hasParameter('genres'))
    {
        $form->bind($request->getParameter('genres'), $request->getFiles('genres'));
        if ($form->isValid())
        {
          $id = $form->getValue('genres_id');
          $genre = GenresPeer::getGenreById($id);
          if(!is_object($genre)) $genre = new Genres();

          $name = $form->getValue('genres_name');
          $genre->setGenresName($name);

          $genre->save();

            $file = $form->getValue('genres_photo');
            if(is_object($file)) {
                $filename_upload = sfConfig::get('sf_images_genres_dir').DIRECTORY_SEPARATOR.$genre->getGenresPath().'.gif';
                $thumbnail = new sfThumbnail(250, 20);
                $thumbnail->loadFile($file->getTempName());
                $thumbnail->save($filename_upload, 'image/gif');
                unset($thumbnail);
            }
        }
    }
    $this->form = $form;
    $this->getUser()->setFlash('genre', null);

  }

  public function executeEdit(sfWebRequest $request)
  {
    $genre = $this->getRoute()->getObject();
    $this->getUser()->setFlash('genre', $genre);
    $this->forward('panelGenres','show');
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
