<?php


/**
 * Skeleton subclass for representing a row from the 'profiles' table.
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
class Profiles extends BaseProfiles {

	/**
	 * Initializes internal state of Profiles object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}

        public function getActiveTracksCriteria($criteria = null) {
            if ($criteria === null) {
                    $criteria = new Criteria(ProfilesPeer::DATABASE_NAME);
            }
            elseif ($criteria instanceof Criteria)
            {
                    $criteria = clone $criteria;
            }

            $criteria->add(TracksPeer::PROFILES_ID, $this->getProfilesId());
            return TracksPeer::addActiveTracksCriteria($criteria);
        }

        public function getActiveTracksCriteriaOrderByDate() {
            $criteria = new Criteria();
            $criteria->addDescendingOrderByColumn(TracksPeer::TRACKS_DATE);
            return $this->getActiveTracksCriteria($criteria);
        }

        public function isContent() {
            $urls = $this->getProfilesUrlss();
            if($this->getProfilesText() || !empty($urls) || $this->getProfilesPhoto()) return true; else return false;
        }

        public function getProfilesNameFirstLetter() {
            return substr($this->getProfilesName(), 0, 1);
        }

        public function getProfilesTextShorted() {
            $text = strip_tags($this->getProfilesText());
            if(strlen($text)>sfConfig::get('app_max_profile_short_text_length')) {
                $text = substr($text, 0, sfConfig::get('app_max_profile_short_text_length'));
                if(strpos($text, '.')>0) $text = substr($text, 0, strpos($text, '.')); // do kropki w przypadku gdy występuje
                $text.='..';
            }
            return $text;
        }

        public function getProfilesGenres() {
            $criteria = $this->getActiveTracksCriteria();
            $tracks = TracksPeer::doSelect($criteria);
            $profile_genres = array();
            foreach($tracks as $track) {
                $genres = $track->getTracksGenress();
                foreach($genres as $genre) {
                    if(!empty($profile_genres[$genre->getGenresId()])) $profile_genres[$genre->getGenresId()]++; else $profile_genres[$genre->getGenresId()] = 1;
                }
            }
            arsort ($profile_genres); // sortowanie od największego

            $counter = 0;
            $genres_ids = array();
            foreach($profile_genres as $genre_key => $genre_value) {
                $counter++;
                if($counter>sfConfig::get('app_profile_genres_amount')) break;
                $genres_ids[] = $genre_key; // wydobycie największych kluczy
            }

            $criteria = new Criteria();
            $criteria->add(GenresPeer::GENRES_ID, $genres_ids, Criteria::IN);
            $genres_objects = GenresPeer::doSelect($criteria);

            return $genres_objects;
        }

        public function getProfilesPhotoPath() {
            if($this->getProfilesPhoto()) {
                $path = 'images/profiles/small/'.$this->getProfilesPath().'.jpg';
            } else {
                $path = 'images/icons/default_profile.png';
            }
            return $path;
        }

        public function getProfilesBalanceText() {
            return Smashin::generate_prize($this->getProfilesBalance()/100);
        }

        public function getProfilesTracksSold() {
            $criteria = new Criteria();
            $criteria->addJoin(TransactionsTracksPeer::TRACKS_ID, TracksPeer::TRACKS_ID);
            $criteria->add(TracksPeer::PROFILES_ID, $this->getProfilesId());
            return TransactionsTracksPeer::doCount($criteria);
        }

        public function getProfilesViewedCount() {
            $criteria = new Criteria();
            $criteria->add(ProfilesViewedPeer::ARTISTS_ID, $this->getProfilesId());
            return ProfilesViewedPeer::doCount($criteria);
        }

        /**
         * Twoja ‘Wishlist’ zawiera trackow:
         * @return <type>
         */
        public function getProfilesWishlistCount() {
            return count($this->getProfilesWishlistss());
        }

        /**
         * Twoich trackow w innych ‘Wishlist’:
         * @return <type>
         */
        public function getProfilesInWishlistCount() {
            $criteria = new Criteria();
            $criteria->addJoin(ProfilesWishlistsPeer::TRACKS_ID, TracksPeer::TRACKS_ID);
            $criteria->add(TracksPeer::PROFILES_ID, $this->getProfilesId());
            return ProfilesWishlistsPeer::doCount($criteria);
            //return count($this->getProfilesWishlistss());
        }

        public function getTracksSoldNew() {
            $criteria = new Criteria();
            $criteria->add(TransactionsSaldoPeer::PROFILES_ID, $this->getProfilesId());
            $criteria->add(TransactionsSaldoPeer::TRANSACTIONS_SALDO_VALUE, 0, Criteria::GREATER_THAN);
            $criteria->addJoin(TransactionsSaldoPeer::TRANSACTIONS_TRACKS_ID, TransactionsTracksPeer::TRANSACTIONS_TRACKS_ID);
            $criteria->addJoin(TransactionsTracksPeer::TRANSACTIONS_ID, TransactionsPeer::TRANSACTIONS_ID);
            $criteria->addJoin(TransactionsSaldoPeer::PROFILES_ID, WithdrawsPeer::PROFILES_ID, Criteria::LEFT_JOIN);
            $criteria->add(TransactionsPeer::TRANSACTIONS_DATE, '('.TransactionsPeer::TRANSACTIONS_DATE.'> (SELECT MAX('.WithdrawsPeer::WITHDRAWS_DATE.') FROM '.WithdrawsPeer::TABLE_NAME.' WHERE '.TransactionsSaldoPeer::PROFILES_ID.' = '.WithdrawsPeer::PROFILES_ID.') OR '.WithdrawsPeer::WITHDRAWS_DATE.' IS NULL)', Criteria::CUSTOM);
            $criteria->addGroupByColumn(TransactionsSaldoPeer::TRANSACTIONS_TRACKS_ID);
            $criteria->addDescendingOrderByColumn(WithdrawsPeer::WITHDRAWS_DATE);
            return TransactionsSaldoPeer::doCount($criteria);
        }

        public function getTracksSoldAll() {
            $criteria = new Criteria();
            $criteria->add(TransactionsSaldoPeer::PROFILES_ID, $this->getProfilesId());
            $criteria->add(TransactionsSaldoPeer::TRANSACTIONS_SALDO_VALUE, 0, Criteria::GREATER_THAN);
            $criteria->addGroupByColumn(TransactionsSaldoPeer::TRANSACTIONS_TRACKS_ID);
            return TransactionsSaldoPeer::doCount($criteria);
        }

        public function save(PropelPDO $con = null)
        {
            if ($this->isNew())
            {
              $pass = Smashin::generateHash($this->getProfilesPassword());
              $this->setProfilesPassword($pass);

              $this->setProfilesDate(time());
              $path = ProfilesPeer::generateProfilesPath($this->getProfilesName());
              $this->setProfilesPath($path);
            }
            return parent::save($con);
        }

        public function countTrackssActive() {
            $criteria = $this->getActiveTracksCriteria();
            return $this->countTrackss($criteria);
        }

} // Profiles
