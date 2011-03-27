<?php

/**
 * membersUploadTrack actions.
 *
 * @package    smashintracks
 * @subpackage membersUploadTrack
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membersUploadTrackActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
//      $profile = ProfilesPeer::getCurrentProfile();
      $form = new TracksForm();
//      print_r(GenresPeer::getGenresNames());
      if ($request->isMethod('post') && $request->hasParameter('tracks'))
      {
        $form->bind($request->getParameter('tracks'), $request->getFiles('tracks'));
        if ($form->isValid())
        {
            $track = $form->save();
            $track = new Tracks();

            $time_regex = $form->getValue('tracks_time_regex');
            $time = (int)strtr($time_regex, ':', '');
            $track->setTracksTime($time);
            $track->setTracksAccepted(true); // do testów
            $track->setProfiles(ProfilesPeer::getCurrentProfile());
            $track->save();

            $file_tracks_preview = $form->getValue('tracks_preview');
            if(is_object($file_tracks_preview)) { // musi być po $track->save(); - potrzebny TracksId
                $filename_tracks_preview = sfConfig::get('sf_upload_tracks_preview_dir').DIRECTORY_SEPARATOR.$profile->getProfilesPath().'-'.$track->getTracksTitle().'mp3';
                $file_tracks_preview->save($filename_tracks_preview);
            }

            $file_full_track = $form->getValue('full_track');
            if(is_object($file_full_track)) { // musi być po $track->save(); - potrzebny TracksId
                $filename_full_track = sfConfig::get('sf_upload_full_track_dir').DIRECTORY_SEPARATOR.$profile->getProfilesPath().'-'.$track->getTracksTitle().'mp3';
                $file_full_track->save($filename_full_track);
            }

            for($i=1;$i<=3;$i++) {
                if($form->getValue('genre'.$i)) {
                    $genre[$i] = GenresPeer::getGenreByName($form->getValue('genre'.$i));
                    $track_genre[$i] = new TracksGenres();
                    $track_genre[$i]->setGenres($genre[$i]);
                    $track_genre[$i]->setTracks($track);
                    $track_genre[$i]->save();
                }
            }

        }
      }
      $this->form = $form;
  }
}
