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

    /*
     * Generuje unikalny URL
     */
    public static function generateProfilesPath($string) {
        $path_size = self::getTableMap()->getColumn(self::PROFILES_PATH)->getSize();
        $path = Smashin::generate_url($string, $path_size);
        $counter=1;
        while(true) {
            $criteria = new Criteria(self::DATABASE_NAME);
            $criteria->add(self::PROFILES_PATH, $path);
            if(self::doSelectOne($criteria)) {
                $add_end = '-'.$counter;
                $path = Smashin::generate_url($string, $path_size-strlen($add_end)).$add_end;
                $counter++;
            } else break;
        }
        return $path;
        
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
