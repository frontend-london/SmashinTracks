<?php

class Basket {
    protected $tracks;
    protected $profiles_id = null;
    protected $is_profile = false;
    
    
    public function __construct($profiles_id = null) {
        $this->tracks = array();
        if(isset($profiles_id)) {
            $this->profiles_id = $profiles_id;
            $profile_baskets = ProfilesPeer::getProfileById($profiles_id)->getProfilesBasketss();
            foreach ($profile_baskets as $profile_basket) {
                $this->addTrack($profile_basket->getTracksId(), $profile_basket->getProfilesBasketsDate('U'), false, true);
            }
            $this->is_profile = true; // na końcu by nie dodawać wpisów do bazy które już tam są
        }
    }

    public function hasProfile() {
        return $this->is_profile;
    }

    public function setProfile($profiles_id = null) {
        if(isset($profiles_id)) {
            if($this->profiles_id == $profiles_id) { // gdy koszyk istniał wcześniej podpięty pod konto
                $this->tracks = array();
            } else { // gdy świeżo podpięto pod konto
                $this->profiles_id = $profiles_id;
                $this->is_profile = true;
                foreach($this->tracks as $id => $date) {
                    $this->addTrack($id, $date, true);
                }
            }

            $profile_baskets = ProfilesPeer::getProfileById($profiles_id)->getProfilesBasketss();
            foreach ($profile_baskets as $profile_basket) {
                $this->addTrack($profile_basket->getTracksId(), $profile_basket->getProfilesBasketsDate('U'), false, true);
            }
        } else { // gdy konto nie jest podpięte
            $this->profiles_id =  null;
            $this->is_profile = false;
        }
    }

    public function addTrack($id, $date = null, $only_to_db = false, $only_to_array = false) {
        if(empty($date)) $date = time();
        if(isset($this->tracks[$id]) && $this->tracks[$id]>$date) $date = $this->tracks[$id];
        if(($this->is_profile) && (!$only_to_array)) {
            $profile_basket = ProfilesBasketsPeer::getProfilesBasketsByProfileIdTrackId($this->profiles_id, $id);
            if(!is_object($profile_basket)) {
                $profile_basket = new ProfilesBaskets();
                $profile_basket->setProfilesId($this->profiles_id);
                $profile_basket->setTracksId($id);
            }

            if((!is_object($profile_basket) || $profile_basket->getProfilesBasketsDate('U')!=$date)) {
                $profile_basket->setProfilesBasketsDate($date);
                $profile_basket->save();
            }
        }

        //if(!isset($this->tracks[$id])) // gdy ktoś doda jeszcze raz nie ląduje na końcu listy
        if(!$only_to_db) $this->tracks[$id] = $date;
        
    }

    public function removeTrack($id) {
        if($this->is_profile) {
            $profile_basket = ProfilesBasketsPeer::getProfilesBasketsByProfileIdTrackId($this->profiles_id, $id);
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