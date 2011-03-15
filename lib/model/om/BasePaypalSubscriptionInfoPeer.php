<?php

/**
 * Base static class for performing query and update operations on the 'paypal_subscription_info' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/15/11 14:04:24
 *
 * @package    lib.model.om
 */
abstract class BasePaypalSubscriptionInfoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'paypal_subscription_info';

	/** the related Propel class for this table */
	const OM_CLASS = 'PaypalSubscriptionInfo';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.PaypalSubscriptionInfo';

	/** the related TableMap class for this table */
	const TM_CLASS = 'PaypalSubscriptionInfoTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 23;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the PAYPAL_SUBSCRIPTION_INFO_ID field */
	const PAYPAL_SUBSCRIPTION_INFO_ID = 'paypal_subscription_info.PAYPAL_SUBSCRIPTION_INFO_ID';

	/** the column name for the SUBSCR_ID field */
	const SUBSCR_ID = 'paypal_subscription_info.SUBSCR_ID';

	/** the column name for the SUB_EVENT field */
	const SUB_EVENT = 'paypal_subscription_info.SUB_EVENT';

	/** the column name for the SUBSCR_DATE field */
	const SUBSCR_DATE = 'paypal_subscription_info.SUBSCR_DATE';

	/** the column name for the SUBSCR_EFFECTIVE field */
	const SUBSCR_EFFECTIVE = 'paypal_subscription_info.SUBSCR_EFFECTIVE';

	/** the column name for the PERIOD1 field */
	const PERIOD1 = 'paypal_subscription_info.PERIOD1';

	/** the column name for the PERIOD2 field */
	const PERIOD2 = 'paypal_subscription_info.PERIOD2';

	/** the column name for the PERIOD3 field */
	const PERIOD3 = 'paypal_subscription_info.PERIOD3';

	/** the column name for the AMOUNT1 field */
	const AMOUNT1 = 'paypal_subscription_info.AMOUNT1';

	/** the column name for the AMOUNT2 field */
	const AMOUNT2 = 'paypal_subscription_info.AMOUNT2';

	/** the column name for the AMOUNT3 field */
	const AMOUNT3 = 'paypal_subscription_info.AMOUNT3';

	/** the column name for the MC_AMOUNT1 field */
	const MC_AMOUNT1 = 'paypal_subscription_info.MC_AMOUNT1';

	/** the column name for the MC_AMOUNT2 field */
	const MC_AMOUNT2 = 'paypal_subscription_info.MC_AMOUNT2';

	/** the column name for the MC_AMOUNT3 field */
	const MC_AMOUNT3 = 'paypal_subscription_info.MC_AMOUNT3';

	/** the column name for the RECURRING field */
	const RECURRING = 'paypal_subscription_info.RECURRING';

	/** the column name for the REATTEMPT field */
	const REATTEMPT = 'paypal_subscription_info.REATTEMPT';

	/** the column name for the RETRY_AT field */
	const RETRY_AT = 'paypal_subscription_info.RETRY_AT';

	/** the column name for the RECUR_TIMES field */
	const RECUR_TIMES = 'paypal_subscription_info.RECUR_TIMES';

	/** the column name for the USERNAME field */
	const USERNAME = 'paypal_subscription_info.USERNAME';

	/** the column name for the PASSWORD field */
	const PASSWORD = 'paypal_subscription_info.PASSWORD';

	/** the column name for the PAYMENT_TXN_ID field */
	const PAYMENT_TXN_ID = 'paypal_subscription_info.PAYMENT_TXN_ID';

	/** the column name for the SUBSCRIBER_EMAILADDRESS field */
	const SUBSCRIBER_EMAILADDRESS = 'paypal_subscription_info.SUBSCRIBER_EMAILADDRESS';

	/** the column name for the DATECREATION field */
	const DATECREATION = 'paypal_subscription_info.DATECREATION';

	/**
	 * An identiy map to hold any loaded instances of PaypalSubscriptionInfo objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array PaypalSubscriptionInfo[]
	 */
	public static $instances = array();


	// symfony behavior
	
	/**
	 * Indicates whether the current model includes I18N.
	 */
	const IS_I18N = false;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('PaypalSubscriptionInfoId', 'SubscrId', 'SubEvent', 'SubscrDate', 'SubscrEffective', 'Period1', 'Period2', 'Period3', 'Amount1', 'Amount2', 'Amount3', 'McAmount1', 'McAmount2', 'McAmount3', 'Recurring', 'Reattempt', 'RetryAt', 'RecurTimes', 'Username', 'Password', 'PaymentTxnId', 'SubscriberEmailaddress', 'Datecreation', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('paypalSubscriptionInfoId', 'subscrId', 'subEvent', 'subscrDate', 'subscrEffective', 'period1', 'period2', 'period3', 'amount1', 'amount2', 'amount3', 'mcAmount1', 'mcAmount2', 'mcAmount3', 'recurring', 'reattempt', 'retryAt', 'recurTimes', 'username', 'password', 'paymentTxnId', 'subscriberEmailaddress', 'datecreation', ),
		BasePeer::TYPE_COLNAME => array (self::PAYPAL_SUBSCRIPTION_INFO_ID, self::SUBSCR_ID, self::SUB_EVENT, self::SUBSCR_DATE, self::SUBSCR_EFFECTIVE, self::PERIOD1, self::PERIOD2, self::PERIOD3, self::AMOUNT1, self::AMOUNT2, self::AMOUNT3, self::MC_AMOUNT1, self::MC_AMOUNT2, self::MC_AMOUNT3, self::RECURRING, self::REATTEMPT, self::RETRY_AT, self::RECUR_TIMES, self::USERNAME, self::PASSWORD, self::PAYMENT_TXN_ID, self::SUBSCRIBER_EMAILADDRESS, self::DATECREATION, ),
		BasePeer::TYPE_FIELDNAME => array ('paypal_subscription_info_id', 'subscr_id', 'sub_event', 'subscr_date', 'subscr_effective', 'period1', 'period2', 'period3', 'amount1', 'amount2', 'amount3', 'mc_amount1', 'mc_amount2', 'mc_amount3', 'recurring', 'reattempt', 'retry_at', 'recur_times', 'username', 'password', 'payment_txn_id', 'subscriber_emailaddress', 'datecreation', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('PaypalSubscriptionInfoId' => 0, 'SubscrId' => 1, 'SubEvent' => 2, 'SubscrDate' => 3, 'SubscrEffective' => 4, 'Period1' => 5, 'Period2' => 6, 'Period3' => 7, 'Amount1' => 8, 'Amount2' => 9, 'Amount3' => 10, 'McAmount1' => 11, 'McAmount2' => 12, 'McAmount3' => 13, 'Recurring' => 14, 'Reattempt' => 15, 'RetryAt' => 16, 'RecurTimes' => 17, 'Username' => 18, 'Password' => 19, 'PaymentTxnId' => 20, 'SubscriberEmailaddress' => 21, 'Datecreation' => 22, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('paypalSubscriptionInfoId' => 0, 'subscrId' => 1, 'subEvent' => 2, 'subscrDate' => 3, 'subscrEffective' => 4, 'period1' => 5, 'period2' => 6, 'period3' => 7, 'amount1' => 8, 'amount2' => 9, 'amount3' => 10, 'mcAmount1' => 11, 'mcAmount2' => 12, 'mcAmount3' => 13, 'recurring' => 14, 'reattempt' => 15, 'retryAt' => 16, 'recurTimes' => 17, 'username' => 18, 'password' => 19, 'paymentTxnId' => 20, 'subscriberEmailaddress' => 21, 'datecreation' => 22, ),
		BasePeer::TYPE_COLNAME => array (self::PAYPAL_SUBSCRIPTION_INFO_ID => 0, self::SUBSCR_ID => 1, self::SUB_EVENT => 2, self::SUBSCR_DATE => 3, self::SUBSCR_EFFECTIVE => 4, self::PERIOD1 => 5, self::PERIOD2 => 6, self::PERIOD3 => 7, self::AMOUNT1 => 8, self::AMOUNT2 => 9, self::AMOUNT3 => 10, self::MC_AMOUNT1 => 11, self::MC_AMOUNT2 => 12, self::MC_AMOUNT3 => 13, self::RECURRING => 14, self::REATTEMPT => 15, self::RETRY_AT => 16, self::RECUR_TIMES => 17, self::USERNAME => 18, self::PASSWORD => 19, self::PAYMENT_TXN_ID => 20, self::SUBSCRIBER_EMAILADDRESS => 21, self::DATECREATION => 22, ),
		BasePeer::TYPE_FIELDNAME => array ('paypal_subscription_info_id' => 0, 'subscr_id' => 1, 'sub_event' => 2, 'subscr_date' => 3, 'subscr_effective' => 4, 'period1' => 5, 'period2' => 6, 'period3' => 7, 'amount1' => 8, 'amount2' => 9, 'amount3' => 10, 'mc_amount1' => 11, 'mc_amount2' => 12, 'mc_amount3' => 13, 'recurring' => 14, 'reattempt' => 15, 'retry_at' => 16, 'recur_times' => 17, 'username' => 18, 'password' => 19, 'payment_txn_id' => 20, 'subscriber_emailaddress' => 21, 'datecreation' => 22, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. PaypalSubscriptionInfoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(PaypalSubscriptionInfoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::SUBSCR_ID);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::SUB_EVENT);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::SUBSCR_DATE);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::SUBSCR_EFFECTIVE);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::PERIOD1);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::PERIOD2);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::PERIOD3);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::AMOUNT1);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::AMOUNT2);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::AMOUNT3);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::MC_AMOUNT1);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::MC_AMOUNT2);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::MC_AMOUNT3);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::RECURRING);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::REATTEMPT);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::RETRY_AT);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::RECUR_TIMES);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::USERNAME);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::PASSWORD);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::PAYMENT_TXN_ID);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::SUBSCRIBER_EMAILADDRESS);
		$criteria->addSelectColumn(PaypalSubscriptionInfoPeer::DATECREATION);
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PaypalSubscriptionInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PaypalSubscriptionInfoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePaypalSubscriptionInfoPeer', $criteria, $con);
		}

		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     PaypalSubscriptionInfo
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PaypalSubscriptionInfoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return PaypalSubscriptionInfoPeer::populateObjects(PaypalSubscriptionInfoPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			PaypalSubscriptionInfoPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePaypalSubscriptionInfoPeer', $criteria, $con);
		}


		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      PaypalSubscriptionInfo $value A PaypalSubscriptionInfo object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(PaypalSubscriptionInfo $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getPaypalSubscriptionInfoId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A PaypalSubscriptionInfo object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof PaypalSubscriptionInfo) {
				$key = (string) $value->getPaypalSubscriptionInfoId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PaypalSubscriptionInfo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     PaypalSubscriptionInfo Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to paypal_subscription_info
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = PaypalSubscriptionInfoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = PaypalSubscriptionInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = PaypalSubscriptionInfoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				PaypalSubscriptionInfoPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BasePaypalSubscriptionInfoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BasePaypalSubscriptionInfoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new PaypalSubscriptionInfoTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean  Whether or not to return the path wit hthe class name 
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? PaypalSubscriptionInfoPeer::CLASS_DEFAULT : PaypalSubscriptionInfoPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a PaypalSubscriptionInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or PaypalSubscriptionInfo object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BasePaypalSubscriptionInfoPeer:doInsert:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BasePaypalSubscriptionInfoPeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from PaypalSubscriptionInfo object
		}

		if ($criteria->containsKey(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID) && $criteria->keyContainsValue(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BasePaypalSubscriptionInfoPeer:doInsert:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BasePaypalSubscriptionInfoPeer', $values, $con, $pk);
    }

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a PaypalSubscriptionInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or PaypalSubscriptionInfo object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BasePaypalSubscriptionInfoPeer:doUpdate:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BasePaypalSubscriptionInfoPeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID);
			$selectCriteria->add(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID, $criteria->remove(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID), $comparison);

		} else { // $values is PaypalSubscriptionInfo object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);

    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BasePaypalSubscriptionInfoPeer:doUpdate:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BasePaypalSubscriptionInfoPeer', $values, $con, $ret);
    }

    return $ret;
	}

	/**
	 * Method to DELETE all rows from the paypal_subscription_info table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(PaypalSubscriptionInfoPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PaypalSubscriptionInfoPeer::clearInstancePool();
			PaypalSubscriptionInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a PaypalSubscriptionInfo or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or PaypalSubscriptionInfo object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			PaypalSubscriptionInfoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof PaypalSubscriptionInfo) { // it's a model object
			// invalidate the cache for this single object
			PaypalSubscriptionInfoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				PaypalSubscriptionInfoPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			PaypalSubscriptionInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given PaypalSubscriptionInfo object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      PaypalSubscriptionInfo $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(PaypalSubscriptionInfo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PaypalSubscriptionInfoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PaypalSubscriptionInfoPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(PaypalSubscriptionInfoPeer::DATABASE_NAME, PaypalSubscriptionInfoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     PaypalSubscriptionInfo
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = PaypalSubscriptionInfoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(PaypalSubscriptionInfoPeer::DATABASE_NAME);
		$criteria->add(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID, $pk);

		$v = PaypalSubscriptionInfoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PaypalSubscriptionInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(PaypalSubscriptionInfoPeer::DATABASE_NAME);
			$criteria->add(PaypalSubscriptionInfoPeer::PAYPAL_SUBSCRIPTION_INFO_ID, $pks, Criteria::IN);
			$objs = PaypalSubscriptionInfoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

	// symfony behavior
	
	/**
	 * Returns an array of arrays that contain columns in each unique index.
	 *
	 * @return array
	 */
	static public function getUniqueColumnNames()
	{
	  return array();
	}

	// symfony_behaviors behavior
	
	/**
	 * Returns the name of the hook to call from inside the supplied method.
	 *
	 * @param string $method The calling method
	 *
	 * @return string A hook name for {@link sfMixer}
	 *
	 * @throws LogicException If the method name is not recognized
	 */
	static private function getMixerPreSelectHook($method)
	{
	  if (preg_match('/^do(Select|Count)(Join(All(Except)?)?|Stmt)?/', $method, $match))
	  {
	    return sprintf('BasePaypalSubscriptionInfoPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BasePaypalSubscriptionInfoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePaypalSubscriptionInfoPeer::buildTableMap();

