<?php

class Basket {
    protected $tracks;
    protected $profile = null;
    protected $is_profile = false;
    
    
    public function __construct(Profiles $profile = null) {
        $this->tracks = array();
        if(is_object($profile)) {
            $this->profile = $profile;
            $profile_baskets = $profile->getProfilesBasketss();
            foreach ($profile_baskets as $profile_basket) {
                $this->addTrack($profile_basket->getTracksId(), $profile_basket->getProfilesBasketsDate('U'));
            }
            $this->is_profile = true; // na końcu by nie dodawać wpisów do bazy które już tam są
        }
    }

    public function hasProfile() {
        return $this->is_profile;
    }

    public function setProfile(Profiles $profile = null) {
        if(is_object($profile)) {
            $this->profile = $profile;
            $profile_baskets = $profile->getProfilesBasketss();
            foreach ($profile_baskets as $profile_basket) {
                $this->addTrack($profile_basket->getTracksId(), $profile_basket->getProfilesBasketsDate('U'));
            }
            $this->is_profile = true; // na końcu by nie dodawać wpisów do bazy które już tam są
            foreach($tracks as $id => $date) {
                $this->addTrack($id, $date);
            }
        } else {
            $this->profile =  null;
            $this->is_profile = false;
        }
    }

    public function addTrack($id, $date = null) {
        if(isset($this->tracks[$id]) && $this->tracks[$id]>$date) $date = $this->tracks[$id];
        if(empty($date)) $date = time();
        if($this->is_profile) {
            $profile_basket = ProfilesBasketsPeer::getProfilesBasketsByProfileIdTrackId($this->profile->getProfilesId(), $id);
            if(!is_object($profile_basket)) {
                $profile_basket = new ProfilesBaskets();
                $profile_basket->setProfiles($this->profile);
                $profile_basket->setTracksId($id);
            }

            if(!(is_object($profile_basket) && $profile_basket->getProfilesBasketsDate('U')==$date)) {
                $profile_basket->setProfilesBasketsDate($date);
                $profile_basket->save();
            }
        }

        //if(!isset($this->tracks[$id])) // gdy ktoś doda jeszcze raz nie ląduje na końcu listy
        $this->tracks[$id] = $date;
        
    }

    public function removeTrack($id) {
        if($this->is_profile) {
            $profile_basket = ProfilesBasketsPeer::getProfilesBasketsByProfileIdTrackId($this->profile->getProfilesId(), $id);
            if(is_object($profile_basket)) $profile_basket->delete();
        }

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