<?php

class Wishlist extends Basket {

    protected function getProfilesBasketss() {
        return ProfilesPeer::getProfileById($this->profiles_id)->getProfilesWishlistss();
    }

    protected function getProfilesBasketsDate($profile_basket) {
        return $profile_basket->getProfilesWishlistsDate('U');
    }

    protected function setProfilesBasketsDate($profile_basket, $date) {
        $profile_basket->setProfilesWishlistsDate($date);
    }

    protected function getProfilesBasketsByProfileIdTrackId($id) {
        return ProfilesWishlistsPeer::getProfilesWishlistsByProfileIdTrackId($this->profiles_id, $id);
    }

    protected function createProfilesBaskets() {
        return new ProfilesWishlists();
    }
}