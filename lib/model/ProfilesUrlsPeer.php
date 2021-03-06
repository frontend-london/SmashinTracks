<?php


/**
 * Skeleton subclass for performing query and update operations on the 'profiles_urls' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:21
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ProfilesUrlsPeer extends BaseProfilesUrlsPeer {

    public static function getProfilesUrlsById($id) {
        $criteria = new Criteria();
        $criteria->add(ProfilesUrlsPeer::PROFILES_URLS_ID, $id);
        return self::doSelectOne($criteria);
    }
} // ProfilesUrlsPeer
