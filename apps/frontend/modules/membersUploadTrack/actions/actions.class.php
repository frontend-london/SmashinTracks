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
      $profile = ProfilesPeer::getCurrentProfile();
      $form = new TracksForm();//array('tracks_artist' => $profile->getProfilesName())
      $upload_track_complete = false;
      $upload_track_limit = false;

      $num_today_uploaded = TracksPeer::countTodayUploadedTracks($profile);

      if($num_today_uploaded>=sfConfig::get('app_max_upload_day_limit')) {
        $upload_track_limit = true;
      } elseif ($request->isMethod('post') && $request->hasParameter('tracks')) {
        $form->bind($request->getParameter('tracks'), $request->getFiles('tracks'));
        if ($form->isValid())
        {
            $time_regex = $form->getValue('tracks_time_regex');
            $time = (int)strtr($time_regex, array(':' => ''));
            $form->updateObject(array('tracks_time' => $time, 'profiles_id' => $profile->getProfilesId()));
            $form->updateObject(array('tracks_accepted' => true));
            $track = $form->save();


            $file_tracks_preview = $form->getValue('tracks_preview');
            if(is_object($file_tracks_preview)) { // musi być po $track->save(); - potrzebny TracksId
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
                    $track_genre[$i] = new TracksGenres();
                    $track_genre[$i]->setGenres($genre[$i]);
                    $track_genre[$i]->setTracks($track);
                    $track_genre[$i]->save();
                }
            }

            $form = new TracksForm();
            $upload_track_complete = true;

            

        }
      }
      $this->form = $form;
      $this->upload_track_complete = $upload_track_complete;
      $this->upload_track_limit = $upload_track_limit;
  }
}
