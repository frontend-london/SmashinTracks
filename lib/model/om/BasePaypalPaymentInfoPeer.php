<?php

/**
 * Base static class for performing query and update operations on the 'paypal_payment_info' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/14/11 14:46:08
 *
 * @package    lib.model.om
 */
abstract class BasePaypalPaymentInfoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'paypal_payment_info';

	/** the related Propel class for this table */
	const OM_CLASS = 'PaypalPaymentInfo';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.PaypalPaymentInfo';

	/** the related TableMap class for this table */
	const TM_CLASS = 'PaypalPaymentInfoTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 29;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the FIRSTNAME field */
	const FIRSTNAME = 'paypal_payment_info.FIRSTNAME';

	/** the column name for the LASTNAME field */
	const LASTNAME = 'paypal_payment_info.LASTNAME';

	/** the column name for the BUYER_EMAIL field */
	const BUYER_EMAIL = 'paypal_payment_info.BUYER_EMAIL';

	/** the column name for the STREET field */
	const STREET = 'paypal_payment_info.STREET';

	/** the column name for the CITY field */
	const CITY = 'paypal_payment_info.CITY';

	/** the column name for the STATE field */
	const STATE = 'paypal_payment_info.STATE';

	/** the column name for the ZIPCODE field */
	const ZIPCODE = 'paypal_payment_info.ZIPCODE';

	/** the column name for the MEMO field */
	const MEMO = 'paypal_payment_info.MEMO';

	/** the column name for the ITEMNAME field */
	const ITEMNAME = 'paypal_payment_info.ITEMNAME';

	/** the column name for the ITEMNUMBER field */
	const ITEMNUMBER = 'paypal_payment_info.ITEMNUMBER';

	/** the column name for the OS0 field */
	const OS0 = 'paypal_payment_info.OS0';

	/** the column name for the ON0 field */
	const ON0 = 'paypal_payment_info.ON0';

	/** the column name for the OS1 field */
	const OS1 = 'paypal_payment_info.OS1';

	/** the column name for the ON1 field */
	const ON1 = 'paypal_payment_info.ON1';

	/** the column name for the QUANTITY field */
	const QUANTITY = 'paypal_payment_info.QUANTITY';

	/** the column name for the PAYMENTDATE field */
	const PAYMENTDATE = 'paypal_payment_info.PAYMENTDATE';

	/** the column name for the PAYMENTTYPE field */
	const PAYMENTTYPE = 'paypal_payment_info.PAYMENTTYPE';

	/** the column name for the TXNID field */
	const TXNID = 'paypal_payment_info.TXNID';

	/** the column name for the MC_GROSS field */
	const MC_GROSS = 'paypal_payment_info.MC_GROSS';

	/** the column name for the MC_FEE field */
	const MC_FEE = 'paypal_payment_info.MC_FEE';

	/** the column name for the PAYMENTSTATUS field */
	const PAYMENTSTATUS = 'paypal_payment_info.PAYMENTSTATUS';

	/** the column name for the PENDINGREASON field */
	const PENDINGREASON = 'paypal_payment_info.PENDINGREASON';

	/** the column name for the TXNTYPE field */
	const TXNTYPE = 'paypal_payment_info.TXNTYPE';

	/** the column name for the TAX field */
	const TAX = 'paypal_payment_info.TAX';

	/** the column name for the MC_CURRENCY field */
	const MC_CURRENCY = 'paypal_payment_info.MC_CURRENCY';

	/** the column name for the REASONCODE field */
	const REASONCODE = 'paypal_payment_info.REASONCODE';

	/** the column name for the CUSTOM field */
	const CUSTOM = 'paypal_payment_info.CUSTOM';

	/** the column name for the COUNTRY field */
	const COUNTRY = 'paypal_payment_info.COUNTRY';

	/** the column name for the DATECREATION field */
	const DATECREATION = 'paypal_payment_info.DATECREATION';

	/**
	 * An identiy map to hold any loaded instances of PaypalPaymentInfo objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array PaypalPaymentInfo[]
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
		BasePeer::TYPE_PHPNAME => array ('Firstname', 'Lastname', 'BuyerEmail', 'Street', 'City', 'State', 'Zipcode', 'Memo', 'Itemname', 'Itemnumber', 'Os0', 'On0', 'Os1', 'On1', 'Quantity', 'Paymentdate', 'Paymenttype', 'Txnid', 'McGross', 'McFee', 'Paymentstatus', 'Pendingreason', 'Txntype', 'Tax', 'McCurrency', 'Reasoncode', 'Custom', 'Country', 'Datecreation', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('firstname', 'lastname', 'buyerEmail', 'street', 'city', 'state', 'zipcode', 'memo', 'itemname', 'itemnumber', 'os0', 'on0', 'os1', 'on1', 'quantity', 'paymentdate', 'paymenttype', 'txnid', 'mcGross', 'mcFee', 'paymentstatus', 'pendingreason', 'txntype', 'tax', 'mcCurrency', 'reasoncode', 'custom', 'country', 'datecreation', ),
		BasePeer::TYPE_COLNAME => array (self::FIRSTNAME, self::LASTNAME, self::BUYER_EMAIL, self::STREET, self::CITY, self::STATE, self::ZIPCODE, self::MEMO, self::ITEMNAME, self::ITEMNUMBER, self::OS0, self::ON0, self::OS1, self::ON1, self::QUANTITY, self::PAYMENTDATE, self::PAYMENTTYPE, self::TXNID, self::MC_GROSS, self::MC_FEE, self::PAYMENTSTATUS, self::PENDINGREASON, self::TXNTYPE, self::TAX, self::MC_CURRENCY, self::REASONCODE, self::CUSTOM, self::COUNTRY, self::DATECREATION, ),
		BasePeer::TYPE_FIELDNAME => array ('firstname', 'lastname', 'buyer_email', 'street', 'city', 'state', 'zipcode', 'memo', 'itemname', 'itemnumber', 'os0', 'on0', 'os1', 'on1', 'quantity', 'paymentdate', 'paymenttype', 'txnid', 'mc_gross', 'mc_fee', 'paymentstatus', 'pendingreason', 'txntype', 'tax', 'mc_currency', 'reasoncode', 'custom', 'country', 'datecreation', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Firstname' => 0, 'Lastname' => 1, 'BuyerEmail' => 2, 'Street' => 3, 'City' => 4, 'State' => 5, 'Zipcode' => 6, 'Memo' => 7, 'Itemname' => 8, 'Itemnumber' => 9, 'Os0' => 10, 'On0' => 11, 'Os1' => 12, 'On1' => 13, 'Quantity' => 14, 'Paymentdate' => 15, 'Paymenttype' => 16, 'Txnid' => 17, 'McGross' => 18, 'McFee' => 19, 'Paymentstatus' => 20, 'Pendingreason' => 21, 'Txntype' => 22, 'Tax' => 23, 'McCurrency' => 24, 'Reasoncode' => 25, 'Custom' => 26, 'Country' => 27, 'Datecreation' => 28, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('firstname' => 0, 'lastname' => 1, 'buyerEmail' => 2, 'street' => 3, 'city' => 4, 'state' => 5, 'zipcode' => 6, 'memo' => 7, 'itemname' => 8, 'itemnumber' => 9, 'os0' => 10, 'on0' => 11, 'os1' => 12, 'on1' => 13, 'quantity' => 14, 'paymentdate' => 15, 'paymenttype' => 16, 'txnid' => 17, 'mcGross' => 18, 'mcFee' => 19, 'paymentstatus' => 20, 'pendingreason' => 21, 'txntype' => 22, 'tax' => 23, 'mcCurrency' => 24, 'reasoncode' => 25, 'custom' => 26, 'country' => 27, 'datecreation' => 28, ),
		BasePeer::TYPE_COLNAME => array (self::FIRSTNAME => 0, self::LASTNAME => 1, self::BUYER_EMAIL => 2, self::STREET => 3, self::CITY => 4, self::STATE => 5, self::ZIPCODE => 6, self::MEMO => 7, self::ITEMNAME => 8, self::ITEMNUMBER => 9, self::OS0 => 10, self::ON0 => 11, self::OS1 => 12, self::ON1 => 13, self::QUANTITY => 14, self::PAYMENTDATE => 15, self::PAYMENTTYPE => 16, self::TXNID => 17, self::MC_GROSS => 18, self::MC_FEE => 19, self::PAYMENTSTATUS => 20, self::PENDINGREASON => 21, self::TXNTYPE => 22, self::TAX => 23, self::MC_CURRENCY => 24, self::REASONCODE => 25, self::CUSTOM => 26, self::COUNTRY => 27, self::DATECREATION => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('firstname' => 0, 'lastname' => 1, 'buyer_email' => 2, 'street' => 3, 'city' => 4, 'state' => 5, 'zipcode' => 6, 'memo' => 7, 'itemname' => 8, 'itemnumber' => 9, 'os0' => 10, 'on0' => 11, 'os1' => 12, 'on1' => 13, 'quantity' => 14, 'paymentdate' => 15, 'paymenttype' => 16, 'txnid' => 17, 'mc_gross' => 18, 'mc_fee' => 19, 'paymentstatus' => 20, 'pendingreason' => 21, 'txntype' => 22, 'tax' => 23, 'mc_currency' => 24, 'reasoncode' => 25, 'custom' => 26, 'country' => 27, 'datecreation' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
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
	 * @param      string $column The column name for current table. (i.e. PaypalPaymentInfoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(PaypalPaymentInfoPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::FIRSTNAME);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::LASTNAME);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::BUYER_EMAIL);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::STREET);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::CITY);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::STATE);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::ZIPCODE);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::MEMO);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::ITEMNAME);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::ITEMNUMBER);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::OS0);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::ON0);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::OS1);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::ON1);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::QUANTITY);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::PAYMENTDATE);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::PAYMENTTYPE);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::TXNID);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::MC_GROSS);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::MC_FEE);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::PAYMENTSTATUS);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::PENDINGREASON);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::TXNTYPE);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::TAX);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::MC_CURRENCY);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::REASONCODE);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::CUSTOM);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::COUNTRY);
		$criteria->addSelectColumn(PaypalPaymentInfoPeer::DATECREATION);
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
		$criteria->setPrimaryTableName(PaypalPaymentInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PaypalPaymentInfoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePaypalPaymentInfoPeer', $criteria, $con);
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
	 * @return     PaypalPaymentInfo
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PaypalPaymentInfoPeer::doSelect($critcopy, $con);
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
		return PaypalPaymentInfoPeer::populateObjects(PaypalPaymentInfoPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			PaypalPaymentInfoPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BasePaypalPaymentInfoPeer', $criteria, $con);
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
	 * @param      PaypalPaymentInfo $value A PaypalPaymentInfo object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(PaypalPaymentInfo $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getTxnid();
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
	 * @param      mixed $value A PaypalPaymentInfo object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof PaypalPaymentInfo) {
				$key = (string) $value->getTxnid();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PaypalPaymentInfo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     PaypalPaymentInfo Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to paypal_payment_info
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
		if ($row[$startcol + 17] === null) {
			return null;
		}
		return (string) $row[$startcol + 17];
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
		$cls = PaypalPaymentInfoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = PaypalPaymentInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = PaypalPaymentInfoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				PaypalPaymentInfoPeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BasePaypalPaymentInfoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BasePaypalPaymentInfoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new PaypalPaymentInfoTableMap());
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
		return $withPrefix ? PaypalPaymentInfoPeer::CLASS_DEFAULT : PaypalPaymentInfoPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a PaypalPaymentInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or PaypalPaymentInfo object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BasePaypalPaymentInfoPeer:doInsert:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BasePaypalPaymentInfoPeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from PaypalPaymentInfo object
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
    foreach (sfMixer::getCallables('BasePaypalPaymentInfoPeer:doInsert:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BasePaypalPaymentInfoPeer', $values, $con, $pk);
    }

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a PaypalPaymentInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or PaypalPaymentInfo object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BasePaypalPaymentInfoPeer:doUpdate:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BasePaypalPaymentInfoPeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(PaypalPaymentInfoPeer::TXNID);
			$selectCriteria->add(PaypalPaymentInfoPeer::TXNID, $criteria->remove(PaypalPaymentInfoPeer::TXNID), $comparison);

		} else { // $values is PaypalPaymentInfo object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);

    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BasePaypalPaymentInfoPeer:doUpdate:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BasePaypalPaymentInfoPeer', $values, $con, $ret);
    }

    return $ret;
	}

	/**
	 * Method to DELETE all rows from the paypal_payment_info table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(PaypalPaymentInfoPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PaypalPaymentInfoPeer::clearInstancePool();
			PaypalPaymentInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a PaypalPaymentInfo or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or PaypalPaymentInfo object or primary key or array of primary keys
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
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			PaypalPaymentInfoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof PaypalPaymentInfo) { // it's a model object
			// invalidate the cache for this single object
			PaypalPaymentInfoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PaypalPaymentInfoPeer::TXNID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				PaypalPaymentInfoPeer::removeInstanceFromPool($singleval);
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
			PaypalPaymentInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given PaypalPaymentInfo object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      PaypalPaymentInfo $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(PaypalPaymentInfo $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PaypalPaymentInfoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PaypalPaymentInfoPeer::TABLE_NAME);

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

		return BasePeer::doValidate(PaypalPaymentInfoPeer::DATABASE_NAME, PaypalPaymentInfoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      string $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     PaypalPaymentInfo
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = PaypalPaymentInfoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(PaypalPaymentInfoPeer::DATABASE_NAME);
		$criteria->add(PaypalPaymentInfoPeer::TXNID, $pk);

		$v = PaypalPaymentInfoPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(PaypalPaymentInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(PaypalPaymentInfoPeer::DATABASE_NAME);
			$criteria->add(PaypalPaymentInfoPeer::TXNID, $pks, Criteria::IN);
			$objs = PaypalPaymentInfoPeer::doSelect($criteria, $con);
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
	    return sprintf('BasePaypalPaymentInfoPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BasePaypalPaymentInfoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePaypalPaymentInfoPeer::buildTableMap();

