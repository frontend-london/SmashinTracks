<?php

/**
 * panelRecommends actions.
 *
 * @package    smashintracks
 * @subpackage panelRecommends
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelRecommendsActions extends sfActions
{

  public function executeChangeOrder(sfWebRequest $request)
  {
      $tracks_recommends = $this->getRoute()->getObject();

      $second_tracks_recommends_id = $request->getParameter('second_tracks_recommends_id');
      $second_tracks_recommends = TracksRecommendsPeer::getTracksRecommendsById($second_tracks_recommends_id);
      $this->forward404Unless(is_object($second_tracks_recommends));

      $tracks_recommends_order = $tracks_recommends->getTracksRecommendsOrder();
      $second_tracks_recommends_order = $second_tracks_recommends->getTracksRecommendsOrder();

      $tracks_recommends->setTracksRecommendsOrder($second_tracks_recommends_order);
      $second_tracks_recommends->setTracksRecommendsOrder($tracks_recommends_order);

      $tracks_recommends->save();
      $second_tracks_recommends->save();
      $this->redirect('panel_recommends');
  }

  public function executeDelete(sfWebRequest $request)
  {
      $tracks_recommends = $this->getRoute()->getObject();

      $tracks_recommends->delete();

      $this->redirect('panel_recommends');
  }

  public function executeAdd(sfWebRequest $request)
  {
      $tracks = $this->getRoute()->getObject();

      $tracks_recommends = $tracks->getTracksRecommendss();

      if(empty($tracks_recommends)) {
          $tracks_recommends = new TracksRecommends();
          $tracks_recommends->setTracks($tracks);
          $tracks_recommends->save();
      }

      $this->redirect('panel_recommends');
  }

  public function executeShow(sfWebRequest $request)
  {
      $delete_recommends = $request->getParameter('delete_recommends');

      if(is_array($delete_recommends)) {
          foreach($delete_recommends as $key => $val) {
              $tracks_recommends = TracksRecommendsPeer::getTracksRecommendsById($key);
              if(is_object($tracks_recommends)) $tracks_recommends->delete();
          }
      }

      $accept_recommends = $request->getParameter('accept_recommends');

      if(is_array($accept_recommends)) {
          foreach($accept_recommends as $key => $val) {
              $tracks_recommends = TracksRecommendsPeer::getTracksRecommendsById($key);
              if(is_object($tracks_recommends)) {
                  $tracks_recommends->setTracksRecommendsActive(true);
                  $tracks_recommends->save();
              }
          }
      }


    $this->active_recommends = TracksRecommendsPeer::getActiveTracksRecommends(null, null);
    $this->inactive_recommends = TracksRecommendsPeer::getInactiveTracksRecommends(null, null);
  }
}
