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

        public function getActiveTracksCriteriaOrderByPopular() {
            $criteria = new Criteria();
            $criteria->addJoin(TracksPeer::TRACKS_ID, TransactionsTracksPeer::TRACKS_ID);
            $criteria->addGroupByColumn(TransactionsTracksPeer::TRACKS_ID);
            $criteria->addDescendingOrderByColumn('COUNT('.TransactionsTracksPeer::TRACKS_ID.')');
            return $this->getActiveTracksCriteria($criteria);
        }

        public function getActiveTracksCriteriaOrderByInWishlists() {
            $criteria = new Criteria();
            $criteria->addJoin(TracksPeer::TRACKS_ID, ProfilesWishlistsPeer::TRACKS_ID);
            $criteria->addGroupByColumn(ProfilesWishlistsPeer::TRACKS_ID);
            $criteria->addDescendingOrderByColumn('COUNT('.ProfilesWishlistsPeer::TRACKS_ID.')');
            return $this->getActiveTracksCriteria($criteria);
        }

        public function isContent() {
            $urls = $this->getProfilesUrlss();
            if($this->getProfilesText() || !empty($urls) || $this->getProfilesPhoto()) return true; else return false;
        }

        public function isAdmin() {
            return $this->isAdminProfile();
        }

        public function isAdminProfile() {
            return($this->getProfilesId() == sfConfig::get('app_admin_profile_id'));
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

        public function getProfilesBalanceReal() {
            return $this->getProfilesBalance()/100;
        }

        public function getProfilesTracksSold() {
            $criteria = new Criteria();
            $criteria->addJoin(TransactionsTracksPeer::TRACKS_ID, TracksPeer::TRACKS_ID);
            $criteria->add(TracksPeer::PROFILES_ID, $this->getProfilesId());
            return TransactionsTracksPeer::doCount($criteria);
        }

        public function getProfilesViewedCount() {
            $criteria = new Criteria();
            $criteria->add(ProfilesViewedPeer::PROFILES_ID, $this->getProfilesId());
            return ProfilesViewedPeer::doCount($criteria);
        }

        public function getProfilesTransactionId() {
            $criteria = new Criteria();
            $criteria->add(TransactionsPeer::PROFILES_ID, $this->getProfilesId());
            $criteria->add(TransactionsPeer::TRANSACTIONS_DONE, false);
            $criteria->addDescendingOrderByColumn(TransactionsPeer::TRANSACTIONS_DATE);
            $transaction = TransactionsPeer::doSelectOne($criteria);
            if($transaction) return $transaction->getTransactionsId (); else return null;
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

        /*
         * Generuje unikalny URL
         */
        public function generateProfilesPath($string) {
            $path_size = ProfilesPeer::getTableMap()->getColumn(ProfilesPeer::PROFILES_PATH)->getSize();
            $path = Smashin::generate_url($string, $path_size);
            $counter=1;
            while(true) {
                $criteria = new Criteria(ProfilesPeer::DATABASE_NAME);
                if($this->getProfilesId()) $criteria->add(ProfilesPeer::PROFILES_ID, $this->getProfilesId(), Criteria::ALT_NOT_EQUAL);
                $criteria->add(ProfilesPeer::PROFILES_PATH, $path);
                if(ProfilesPeer::doSelectOne($criteria)) {
                    $add_end = '-'.$counter;
                    $path = Smashin::generate_url($string, $path_size-strlen($add_end)).$add_end;
                    $counter++;
                } else break;
            }
            return $path;

        }

        public function save(PropelPDO $con = null)
        {
            if ($this->isNew()) $this->setProfilesDate(time());
            $path = $this->generateProfilesPath($this->getProfilesName());
            $this->setProfilesPath($path);

            return parent::save($con);
        }

        public function setProfilesPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

                $big_old = sfConfig::get('sf_images_profiles_big_dir').DIRECTORY_SEPARATOR.$this->profiles_path.'.jpg';
		if (($this->profiles_path !== $v) && file_exists($big_old)) {
                    $big_new = sfConfig::get('sf_images_profiles_big_dir').DIRECTORY_SEPARATOR.$v.'.jpg';
                    $small_old = sfConfig::get('sf_images_profiles_small_dir').DIRECTORY_SEPARATOR.$this->profiles_path.'.jpg';
                    $small_new = sfConfig::get('sf_images_profiles_small_dir').DIRECTORY_SEPARATOR.$v.'.jpg';
                    rename($big_old, $big_new);
                    rename($small_old, $small_new);
		}

		return parent::setProfilesPath($v);
	}

        public function setProfilesPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->profiles_password !== $v) {
			$this->profiles_password = Smashin::generateHash($v);
			$this->modifiedColumns[] = ProfilesPeer::PROFILES_PASSWORD;
		}

		return $this;
	}

        public function countTrackssActive() {
            $criteria = $this->getActiveTracksCriteria();
            return $this->countTrackss($criteria);
        }

        public function getAllTransactions() {
            $transactions = array();
            $routing = sfContext::getInstance()->getRouting();

            /*
             * Shoppings, type = SH
             */
            $transaction_criteria = new Criteria();
            $transaction_criteria->add(TransactionsPeer::TRANSACTIONS_DONE, true);
            $transaction_objects = $this->getTransactionss();
            foreach($transaction_objects as $tr) {
                $nr = ' -';
                $date = $tr->getTransactionsDate('d-m-Y');
                $sort_date = $tr->getTransactionsDate('U');
                while(!empty($transactions[$sort_date])) $sort_date++;
                $details = 'Shopping: #'.$tr->getTransactionsId();
                $details_url = $routing->generate('members_my-downloads');
                $type = 'SH'; // Shopping
                $saldo = ''; //todo
                if($tr->getTransactionsPaymethod()==1) { // gdy przez paypal
                    $paypal = true;
                } else {
                    $paypal = false;
                }
                
                $criteria = new Criteria();
                $criteria->add(TransactionsTracksPeer::TRANSACTIONS_ID, $tr->getTransactionsId());
                $criteria->addJoin(TransactionsSaldoPeer::TRANSACTIONS_TRACKS_ID, TransactionsTracksPeer::TRANSACTIONS_TRACKS_ID);
                $criteria->add(TransactionsSaldoPeer::PROFILES_ID, $this->getProfilesId());
                $criteria->add(TransactionsSaldoPeer::TRANSACTIONS_SALDO_VALUE, 0, Criteria::LESS_THAN);
                $transaction_saldo_objects = $this->getTransactionsSaldos($criteria);
                $prize = 0;
                foreach($transaction_saldo_objects as $trs) {
                    $prize+= $trs->getTransactionsSaldoValue();
                }
                $amount = $prize;
                $amount_string = Smashin::generate_prize($prize/100);
                

                $row = array('nr' => $nr, 'date' => $date,  'sort_date' => $sort_date, 'details' => $details, 'details_url' => $details_url, 'amount' => $amount, 'amount_string' => $amount_string, 'saldo' => $saldo, 'type' => $type, 'paypal' => $paypal);
                $transactions[$sort_date] = $row;
            }

            /*
             * Withdraws, type = W
             */
            $withdraw_objects = $this->getWithdrawss();
            foreach($withdraw_objects as $wd) {
                $nr = ' -';
                $date = $wd->getWithdrawsDate('d-m-Y');
                $sort_date = $wd->getWithdrawsDate('U');
                while(!empty($transactions[$sort_date])) $sort_date++;
                $details = 'Withdrawal to PayPal #'.$wd->getWithdrawsId();
                $details_url = '';
                $prize = $wd->getWithdrawsSaldoValue();
                $amount = $prize;
                $amount_string = Smashin::generate_prize($prize/100);
                $saldo = '';
                $type = 'W';
                $paypal = false;

                $row = array('nr' => $nr, 'date' => $date, 'sort_date' => $sort_date, 'details' => $details, 'details_url' => $details_url, 'amount' => $amount, 'amount_string' => $amount_string, 'saldo' => $saldo, 'type' => $type, 'paypal' => $paypal);
                $transactions[$sort_date] = $row;
            }

            /*
             * Sales, type = SA
             */
            $sales_criteria = new Criteria();
            $sales_criteria->add(TransactionsSaldoPeer::PROFILES_ID, $this->getProfilesId());
            $sales_criteria->add(TransactionsSaldoPeer::TRANSACTIONS_SALDO_VALUE, 0, Criteria::GREATER_THAN);
            $sales_criteria->addJoin(TransactionsSaldoPeer::TRANSACTIONS_TRACKS_ID, TransactionsTracksPeer::TRANSACTIONS_TRACKS_ID);
            $sales_criteria->addJoin(TransactionsTracksPeer::TRANSACTIONS_ID, TransactionsPeer::TRANSACTIONS_ID);
            $sales_criteria->addSelectColumn(TransactionsPeer::TRANSACTIONS_DATE);
            $sales_criteria->addSelectColumn(TransactionsSaldoPeer::TRANSACTIONS_SALDO_VALUE);
            $sales_criteria->addSelectColumn(TransactionsSaldoPeer::TRANSACTIONS_TRACKS_ID);
            $sales_criteria->addSelectColumn(TransactionsTracksPeer::TRACKS_ID);
            $sales_criteria->addAscendingOrderByColumn(TransactionsSaldoPeer::TRANSACTIONS_SALDO_ID);
            $sales_smtm = TransactionsSaldoPeer::doSelectStmt($sales_criteria);
            $nr = 0;
            while($sales_row = $sales_smtm->fetch(PDO::FETCH_ASSOC)) {
                $nr++;
                $date = date("d-m-Y",strtotime ($sales_row['TRANSACTIONS_DATE']));
                $sort_date = date("U",strtotime ($sales_row['TRANSACTIONS_DATE']));
                while(!empty($transactions[$sort_date])) $sort_date++;
                
                $prize = $sales_row['TRANSACTIONS_SALDO_VALUE'];
                $amount = $prize;
                $amount_string = Smashin::generate_prize($prize/100);
                $saldo = '';
                $type = 'SA';
                $paypal = false;

                $tracks_id = $sales_row['TRACKS_ID'];
                $track = TracksPeer::getTrackById($tracks_id);
                $details = $track->getTracksTitleShorted();
                $details_url = $routing->generate('track', $track);


                $row = array('nr' => $nr.'.', 'date' => $date, 'sort_date' => $sort_date, 'details' => $details, 'details_url' => $details_url, 'amount' => $amount, 'amount_string' => $amount_string, 'saldo' => $saldo, 'type' => $type, 'paypal' => $paypal);
                $transactions[$sort_date] = $row;
            }

            ksort($transactions); // od najstarszego do najnowszego
            //print_r($transactions);
            $saldo = 0;
            foreach($transactions as &$transaction) {
                if(!$transaction['paypal']) $saldo+=$transaction['amount'];
                $transaction['saldo'] = Smashin::generate_prize($saldo/100);
            }
            krsort($transactions); // od najnowszego do najstarszego
            
            return $transactions;
        }

        public function getTransactionssActive($criteria) {
            if ($criteria === null) {
                    $criteria = new Criteria(TransactionsPeer::DATABASE_NAME);
            }
            elseif ($criteria instanceof Criteria)
            {
                    $criteria = clone $criteria;
            }

            $criteria->add(TransactionsPeer::TRANSACTIONS_DONE, true);
            return $this->getTransactionss($criteria);
        }

        public function getTransactionssActiveOrderByDate() {
            $criteria = new Criteria();
            $criteria->addDescendingOrderByColumn(TransactionsPeer::TRANSACTIONS_DATE);
            return $this->getTransactionssActive($criteria);
        }

        public function addStats() {
            $ip_address = $_SERVER['REMOTE_ADDR'];

            $criteria = new Criteria();
            $criteria->add(ProfilesViewedPeer::PROFILES_ID, $this->getProfilesId());
            $criteria->add(ProfilesViewedPeer::PROFILES_VIEWED_DATE, date('Y-m-d'), Criteria::GREATER_EQUAL); // dziś, nowsze niż
            $criteria->add(ProfilesViewedPeer::PROFILES_VIEWED_IP_ADDRESS, $ip_address);
            $amount = ProfilesViewedPeer::doCount($criteria);
            if(!$amount) {
                $viewed = new ProfilesViewed();
                $viewed->setProfilesViewedDate(date('U'));
                $viewed->setProfilesViewedIpAddress($ip_address);
                $viewed->setProfiles($this);
                $viewed->save();
            }
        }

        public function getProfilesViewedTimes() {
            $criteria = new Criteria();
            $criteria->add(ProfilesViewedPeer::PROFILES_ID, $this->getProfilesId());
            return ProfilesViewedPeer::doCount($criteria);
        }

} // Profiles
