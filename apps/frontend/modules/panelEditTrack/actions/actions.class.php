<?php

/**
 * panelEditTrack actions.
 *
 * @package    smashintracks
 * @subpackage panelEditTrack
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelEditTrackActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
//  {
//    $track = $this->getRoute()->getObject();
//    if(0) $track = new Tracks();
////    $track->getTracksTimeFormatted();
//    $form = new TracksForm($track);//$track
//    $this->form = $form;
//    $this->track = $track;
//  }

  {
      $track = $this->getRoute()->getObject();
      if(0) $track = new Tracks();
      $form = new TracksForm($track);
      $upload_track_complete = false;



      if ($request->isMethod('post') && $request->hasParameter('tracks')) {
        $form->bind($request->getParameter('tracks'), $request->getFiles('tracks'));
        if ($form->isValid())
        {

            $time_regex = $form->getValue('tracks_time_regex');
            $time = (int)strtr($time_regex, array(':' => ''));
            $form->updateObject(array('tracks_time' => $time));
            $track = $form->save();


            $file_tracks_preview = $form->getValue('tracks_preview');
            if(is_object($file_tracks_preview)) { // musi być po $track->save(); - potrzebny TracksId
//                echo "test";
                $filename_tracks_preview = sfConfig::get('sf_upload_tracks_preview_dir').DIRECTORY_SEPARATOR.$track->getTracksPath().'.mp3';
                $file_tracks_preview->save($filename_tracks_preview);
            }

            $file_full_track = $form->getValue('full_track');
            if(is_object($file_full_track)) { // musi być po $track->save(); - potrzebny TracksId
                $filename_full_track = sfConfig::get('sf_upload_full_track_dir').DIRECTORY_SEPARATOR.$track->getTracksPath().'.mp3';
                $file_full_track->save($filename_full_track);
            }

            for($i=1;$i<=3;$i++) {
                if($form->getValue('genre_'.$i)) {
                    $genre[$i] = GenresPeer::getGenreByName($form->getValue('genre_'.$i));
                    $track_genre[$i] = $track->getTracksGenresObject($i);
                    $track_genre[$i]->setGenres($genre[$i]);
                    $track_genre[$i]->save();
                }
            }

            $upload_track_complete = true;



        }
      }
      $this->form = $form;
      $this->track = $track;
      $this->upload_track_complete = $upload_track_complete;

  }
}
