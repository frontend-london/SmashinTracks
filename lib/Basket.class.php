<?php

class Basket {
    protected $tracks;
    
    public function __construct() {
        $this->tracks = array();
    }

    public function addTrack($id) {
        //if(!isset($this->tracks[$id])) // gdy ktoś doda jeszcze raz nie ląduje na końcu listy
        $this->tracks[$id] = time();
    }

    public function removeTrack($id) {
        unset($this->tracks[$id]);
    }

    public function getTrack($id) {
        if(isset($this->tracks[$id])) {
            return $this->tracks[$id];
        } else {
            return false;
        }
    }

    public function getTracks() {
        return $this->tracks;
    }

    public function getTracksIds() {
        asort($this->tracks);
        return array_keys($this->tracks);
    }
}