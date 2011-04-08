<?php


/**
 * Skeleton subclass for performing query and update operations on the 'profiles' table.
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
class ProfilesPeer extends BaseProfilesPeer {

    public static function getProfilesAscending($criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria(self::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }

        $criteria->addAscendingOrderByColumn(self::PROFILES_NAME);
        return self::doSelect($criteria);
    }

    public static function getMostPopularProfiles($criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria(self::DATABASE_NAME);
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->addJoin(self::PROFILES_ID, TracksPeer::PROFILES_ID);
        $criteria->addJoin(TracksPeer::TRACKS_ID, TransactionsTracksPeer::TRACKS_ID);
        $criteria->addGroupByColumn(self::PROFILES_ID);
        $criteria->addDescendingOrderByColumn('COUNT('.TracksPeer::TRACKS_ID.')'); // sortowanie po ilości tracków sprzedanych
        $criteria->setLimit(30);
        $profiles = self::doSelect($criteria);
        return $profiles;

    }



    public static function getProfileById($profiles_id, $criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->add(self::PROFILES_ID, $profiles_id);
        return self::doSelectOne($criteria);
    }

    public static function getProfileByEmail($profiles_email, $criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->add(self::PROFILES_EMAIL, $profiles_email);
        return self::doSelectOne($criteria);
    }

    public static function isProfileById($profiles_id, $criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->add(self::PROFILES_ID, $profiles_id);
        return self::doCount($criteria);
    }

    public static function isLoginCorrect($email, $pass) {
        $criteria = new Criteria();
        $criteria->add(self::PROFILES_EMAIL, $email);
        $criteria->add(self::PROFILES_PASSWORD, Smashin::generateHash($pass));
        if(empty($email) || empty($pass)) return 0;
        return self::doCount($criteria);
    }

    public static function isPassCorrect($id, $pass) {
        $criteria = new Criteria();
        $criteria->add(self::PROFILES_ID, $id);
        $criteria->add(self::PROFILES_PASSWORD, Smashin::generateHash($pass));
        if(empty($id) || empty($pass)) return 0;
        return self::doCount($criteria);
    }

    public static function isCookiePassCorrect($id, $cookie_pass) {
        if(!is_int($id)) return 0;
        $criteria = new Criteria();
        $criteria->add(self::PROFILES_ID, $id);
        $profile = ProfilesPeer::doSelectOne($criteria);
        if(!is_object($profile)) return 0;
        $pass = $profile->getProfilesPassword();
        $generate_pass = Smashin::generateCookieHash($pass);
        return ($cookie_pass==$generate_pass);
    }

    public static function getProfileIfLoginCorrect($email, $pass) {
        $criteria = new Criteria();
        $criteria->add(self::PROFILES_EMAIL, $email);
        $criteria->add(self::PROFILES_PASSWORD, Smashin::generateHash($pass));
        if(empty($email) || empty($pass)) return null;
        return self::doSelectOne($criteria);
    }

    public static function isCurrentProfile() {
      $oUser = $this->getUser();
      if($oUser->hasAttribute('profile_id')) {
          $profile_id = $oUser->getAttribute('profile_id');
          $this->profile = ProfilesPeer::getProfileById($profile_id);
      }
    }

    public static function getCurrentProfile() {
        $oUser = sfContext::getInstance()->getUser();
        if($oUser->hasAttribute('profile_id')) {
          $profile_id = $oUser->getAttribute('profile_id');
          return self::getProfileById($profile_id);
        } else {
            return null;
        }
    }

    public static function getAdminProfile() {
        $profiles_id = sfConfig::get('app_admin_profile_id');
        return self::getProfileById($profiles_id);
    }

    public static function getCurrentProfileId() {
        $oUser = sfContext::getInstance()->getUser();
        if($oUser->hasAttribute('profile_id')) {
          $profile_id = $oUser->getAttribute('profile_id');
          return $profile_id;
        } else {
            return null;
        }
    }

} // ProfilesPeer
