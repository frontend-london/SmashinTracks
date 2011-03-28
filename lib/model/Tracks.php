<?php


/**
 * Skeleton subclass for representing a row from the 'tracks' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:23
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Tracks extends BaseTracks {

	/**
	 * Initializes internal state of Tracks object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

	public function getTracksTimeFormatted()
	{
		//return $this->getTracksTime();//5:41
                return number_format($this->getTracksTime()/100, 2, ':', '');
	}
        
	public function getTracksArtistUppercase()
	{
		return strtoupper($this->getTracksArtist());
	}

        public function getTracksTitleShorted() {
            $title = $this->getTracksTitle();
            if(strlen($title)>sfConfig::get('app_tracklist_max_name_length')) {
                $title = substr($title, 0, sfConfig::get('app_tracklist_max_name_length')).'..';
            }
            return $title;
        }


        public function isTrackNew() {
            $track_date = $this->getTracksDate('U');
            return((time() - 86400 * sfConfig::get('app_track_new_period'))<$track_date);
        }

        public function isInWishlist() {
            $profile = ProfilesPeer::getCurrentProfile(); // wishlist jest tylko dla zalogwoanych
            if(is_object($profile)) {
                $criteria = new Criteria();
                $criteria->add(ProfilesWishlistsPeer::PROFILES_ID, $profile->getProfilesId());
                $criteria->add(ProfilesWishlistsPeer::TRACKS_ID, $this->getTracksId());
                return ProfilesWishlistsPeer::doCount($criteria);
            }
            return false;
        }

        /*
         * Generuje unikalny URL
         */
        public function generateTracksPath($string) {
            $path_size = TracksPeer::getTableMap()->getColumn(TracksPeer::TRACKS_PATH)->getSize();
            $path = Smashin::generate_url($string, $path_size);
            $counter=1;
            while(true) {
                $criteria = new Criteria(TracksPeer::DATABASE_NAME);
                if($this->getTracksId()) $criteria->add(TracksPeer::TRACKS_ID, $this->getTracksId(), Criteria::ALT_NOT_EQUAL);
                $criteria->add(TracksPeer::TRACKS_PATH, $path);
                if(TracksPeer::doSelectOne($criteria)) {
                    $add_end = '-'.$counter;
                    $path = Smashin::generate_url($string, $path_size-strlen($add_end)).$add_end;
                    $counter++;
                } else break;
            }
            return $path;
        }

        public function save(PropelPDO $con = null) {
            if ($this->isNew()) $this->setTracksDate(time());
            $path = $this->generateTracksPath($this->getTracksArtist().'-'.$this->getTracksTitle());
            $this->setTracksPath($path);
        
            return parent::save($con);
        }

        public function setTracksPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

//                $big_old = sfConfig::get('sf_images_profiles_big_dir').DIRECTORY_SEPARATOR.$this->profiles_path.'.jpg';
//		if (($this->profiles_path !== $v) && file_exists($big_old)) {
//                    $big_new = sfConfig::get('sf_images_profiles_big_dir').DIRECTORY_SEPARATOR.$v.'.jpg';
//                    $small_old = sfConfig::get('sf_images_profiles_small_dir').DIRECTORY_SEPARATOR.$this->profiles_path.'.jpg';
//                    $small_new = sfConfig::get('sf_images_profiles_small_dir').DIRECTORY_SEPARATOR.$v.'.jpg';
//                    rename($big_old, $big_new);
//                    rename($small_old, $small_new);
//		}

		return parent::setTracksPath($v);
	}

} // Tracks
