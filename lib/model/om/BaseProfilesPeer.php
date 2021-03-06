<?php

/**
 * Base static class for performing query and update operations on the 'profiles' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/18/13 06:55:48
 *
 * @package    lib.model.om
 */
abstract class BaseProfilesPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'profiles';

	/** the related Propel class for this table */
	const OM_CLASS = 'Profiles';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.Profiles';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ProfilesTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 17;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the PROFILES_ID field */
	const PROFILES_ID = 'profiles.PROFILES_ID';

	/** the column name for the PROFILES_NAME field */
	const PROFILES_NAME = 'profiles.PROFILES_NAME';

	/** the column name for the PROFILES_EMAIL field */
	const PROFILES_EMAIL = 'profiles.PROFILES_EMAIL';

	/** the column name for the PROFILES_PASSWORD field */
	const PROFILES_PASSWORD = 'profiles.PROFILES_PASSWORD';

	/** the column name for the PROFILES_TEXT field */
	const PROFILES_TEXT = 'profiles.PROFILES_TEXT';

	/** the column name for the PROFILES_DATE field */
	const PROFILES_DATE = 'profiles.PROFILES_DATE';

	/** the column name for the PROFILES_PATH field */
	const PROFILES_PATH = 'profiles.PROFILES_PATH';

	/** the column name for the PROFILES_PHOTO field */
	const PROFILES_PHOTO = 'profiles.PROFILES_PHOTO';

	/** the column name for the PROFILES_BALANCE field */
	const PROFILES_BALANCE = 'profiles.PROFILES_BALANCE';

	/** the column name for the PROFILES_BLOCKED field */
	const PROFILES_BLOCKED = 'profiles.PROFILES_BLOCKED';

	/** the column name for the PROFILES_DELETED field */
	const PROFILES_DELETED = 'profiles.PROFILES_DELETED';

	/** the column name for the PROFILES_REGISTER_URL field */
	const PROFILES_REGISTER_URL = 'profiles.PROFILES_REGISTER_URL';

	/** the column name for the PROFILES_PASSWORD_URL field */
	const PROFILES_PASSWORD_URL = 'profiles.PROFILES_PASSWORD_URL';

	/** the column name for the PROFILES_NEWSLETTER field */
	const PROFILES_NEWSLETTER = 'profiles.PROFILES_NEWSLETTER';

	/** the column name for the PROFILES_SALES_INFORM_INSTANTLY field */
	const PROFILES_SALES_INFORM_INSTANTLY = 'profiles.PROFILES_SALES_INFORM_INSTANTLY';

	/** the column name for the PROFILES_SALES_INFORM_DAILY field */
	const PROFILES_SALES_INFORM_DAILY = 'profiles.PROFILES_SALES_INFORM_DAILY';

	/** the column name for the PROFILES_SALES_INFORM_WEEKLY field */
	const PROFILES_SALES_INFORM_WEEKLY = 'profiles.PROFILES_SALES_INFORM_WEEKLY';

	/**
	 * An identiy map to hold any loaded instances of Profiles objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Profiles[]
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
		BasePeer::TYPE_PHPNAME => array ('ProfilesId', 'ProfilesName', 'ProfilesEmail', 'ProfilesPassword', 'ProfilesText', 'ProfilesDate', 'ProfilesPath', 'ProfilesPhoto', 'ProfilesBalance', 'ProfilesBlocked', 'ProfilesDeleted', 'ProfilesRegisterUrl', 'ProfilesPasswordUrl', 'ProfilesNewsletter', 'ProfilesSalesInformInstantly', 'ProfilesSalesInformDaily', 'ProfilesSalesInformWeekly', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('profilesId', 'profilesName', 'profilesEmail', 'profilesPassword', 'profilesText', 'profilesDate', 'profilesPath', 'profilesPhoto', 'profilesBalance', 'profilesBlocked', 'profilesDeleted', 'profilesRegisterUrl', 'profilesPasswordUrl', 'profilesNewsletter', 'profilesSalesInformInstantly', 'profilesSalesInformDaily', 'profilesSalesInformWeekly', ),
		BasePeer::TYPE_COLNAME => array (self::PROFILES_ID, self::PROFILES_NAME, self::PROFILES_EMAIL, self::PROFILES_PASSWORD, self::PROFILES_TEXT, self::PROFILES_DATE, self::PROFILES_PATH, self::PROFILES_PHOTO, self::PROFILES_BALANCE, self::PROFILES_BLOCKED, self::PROFILES_DELETED, self::PROFILES_REGISTER_URL, self::PROFILES_PASSWORD_URL, self::PROFILES_NEWSLETTER, self::PROFILES_SALES_INFORM_INSTANTLY, self::PROFILES_SALES_INFORM_DAILY, self::PROFILES_SALES_INFORM_WEEKLY, ),
		BasePeer::TYPE_FIELDNAME => array ('profiles_id', 'profiles_name', 'profiles_email', 'profiles_password', 'profiles_text', 'profiles_date', 'profiles_path', 'profiles_photo', 'profiles_balance', 'profiles_blocked', 'profiles_deleted', 'profiles_register_url', 'profiles_password_url', 'profiles_newsletter', 'profiles_sales_inform_instantly', 'profiles_sales_inform_daily', 'profiles_sales_inform_weekly', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ProfilesId' => 0, 'ProfilesName' => 1, 'ProfilesEmail' => 2, 'ProfilesPassword' => 3, 'ProfilesText' => 4, 'ProfilesDate' => 5, 'ProfilesPath' => 6, 'ProfilesPhoto' => 7, 'ProfilesBalance' => 8, 'ProfilesBlocked' => 9, 'ProfilesDeleted' => 10, 'ProfilesRegisterUrl' => 11, 'ProfilesPasswordUrl' => 12, 'ProfilesNewsletter' => 13, 'ProfilesSalesInformInstantly' => 14, 'ProfilesSalesInformDaily' => 15, 'ProfilesSalesInformWeekly' => 16, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('profilesId' => 0, 'profilesName' => 1, 'profilesEmail' => 2, 'profilesPassword' => 3, 'profilesText' => 4, 'profilesDate' => 5, 'profilesPath' => 6, 'profilesPhoto' => 7, 'profilesBalance' => 8, 'profilesBlocked' => 9, 'profilesDeleted' => 10, 'profilesRegisterUrl' => 11, 'profilesPasswordUrl' => 12, 'profilesNewsletter' => 13, 'profilesSalesInformInstantly' => 14, 'profilesSalesInformDaily' => 15, 'profilesSalesInformWeekly' => 16, ),
		BasePeer::TYPE_COLNAME => array (self::PROFILES_ID => 0, self::PROFILES_NAME => 1, self::PROFILES_EMAIL => 2, self::PROFILES_PASSWORD => 3, self::PROFILES_TEXT => 4, self::PROFILES_DATE => 5, self::PROFILES_PATH => 6, self::PROFILES_PHOTO => 7, self::PROFILES_BALANCE => 8, self::PROFILES_BLOCKED => 9, self::PROFILES_DELETED => 10, self::PROFILES_REGISTER_URL => 11, self::PROFILES_PASSWORD_URL => 12, self::PROFILES_NEWSLETTER => 13, self::PROFILES_SALES_INFORM_INSTANTLY => 14, self::PROFILES_SALES_INFORM_DAILY => 15, self::PROFILES_SALES_INFORM_WEEKLY => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('profiles_id' => 0, 'profiles_name' => 1, 'profiles_email' => 2, 'profiles_password' => 3, 'profiles_text' => 4, 'profiles_date' => 5, 'profiles_path' => 6, 'profiles_photo' => 7, 'profiles_balance' => 8, 'profiles_blocked' => 9, 'profiles_deleted' => 10, 'profiles_register_url' => 11, 'profiles_password_url' => 12, 'profiles_newsletter' => 13, 'profiles_sales_inform_instantly' => 14, 'profiles_sales_inform_daily' => 15, 'profiles_sales_inform_weekly' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
	 * @param      string $column The column name for current table. (i.e. ProfilesPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ProfilesPeer::TABLE_NAME.'.', $alias.'.', $column);
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
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_ID);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_NAME);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_EMAIL);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_PASSWORD);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_TEXT);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_DATE);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_PATH);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_PHOTO);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_BALANCE);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_BLOCKED);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_DELETED);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_REGISTER_URL);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_PASSWORD_URL);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_NEWSLETTER);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_SALES_INFORM_INSTANTLY);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_SALES_INFORM_DAILY);
		$criteria->addSelectColumn(ProfilesPeer::PROFILES_SALES_INFORM_WEEKLY);
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
		$criteria->setPrimaryTableName(ProfilesPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProfilesPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseProfilesPeer', $criteria, $con);
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
	 * @return     Profiles
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ProfilesPeer::doSelect($critcopy, $con);
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
		return ProfilesPeer::populateObjects(ProfilesPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ProfilesPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);
		// symfony_behaviors behavior
		foreach (sfMixer::getCallables(self::getMixerPreSelectHook(__FUNCTION__)) as $sf_hook)
		{
		  call_user_func($sf_hook, 'BaseProfilesPeer', $criteria, $con);
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
	 * @param      Profiles $value A Profiles object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(Profiles $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getProfilesId();
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
	 * @param      mixed $value A Profiles object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Profiles) {
				$key = (string) $value->getProfilesId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Profiles object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Profiles Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to profiles
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
		$cls = ProfilesPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ProfilesPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ProfilesPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ProfilesPeer::addInstanceToPool($obj, $key);
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
	  $dbMap = Propel::getDatabaseMap(BaseProfilesPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseProfilesPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ProfilesTableMap());
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
		return $withPrefix ? ProfilesPeer::CLASS_DEFAULT : ProfilesPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a Profiles or Criteria object.
	 *
	 * @param      mixed $values Criteria or Profiles object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BaseProfilesPeer:doInsert:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BaseProfilesPeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Profiles object
		}

		if ($criteria->containsKey(ProfilesPeer::PROFILES_ID) && $criteria->keyContainsValue(ProfilesPeer::PROFILES_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProfilesPeer::PROFILES_ID.')');
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
    foreach (sfMixer::getCallables('BaseProfilesPeer:doInsert:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BaseProfilesPeer', $values, $con, $pk);
    }

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a Profiles or Criteria object.
	 *
	 * @param      mixed $values Criteria or Profiles object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BaseProfilesPeer:doUpdate:pre') as $sf_hook)
    {
      if (false !== $sf_hook_retval = call_user_func($sf_hook, 'BaseProfilesPeer', $values, $con))
      {
        return $sf_hook_retval;
      }
    }

		if ($con === null) {
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ProfilesPeer::PROFILES_ID);
			$selectCriteria->add(ProfilesPeer::PROFILES_ID, $criteria->remove(ProfilesPeer::PROFILES_ID), $comparison);

		} else { // $values is Profiles object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);

    // symfony_behaviors behavior
    foreach (sfMixer::getCallables('BaseProfilesPeer:doUpdate:post') as $sf_hook)
    {
      call_user_func($sf_hook, 'BaseProfilesPeer', $values, $con, $ret);
    }

    return $ret;
	}

	/**
	 * Method to DELETE all rows from the profiles table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ProfilesPeer::TABLE_NAME, $con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ProfilesPeer::clearInstancePool();
			ProfilesPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a Profiles or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Profiles object or primary key or array of primary keys
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
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ProfilesPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Profiles) { // it's a model object
			// invalidate the cache for this single object
			ProfilesPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProfilesPeer::PROFILES_ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ProfilesPeer::removeInstanceFromPool($singleval);
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
			ProfilesPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Profiles object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Profiles $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(Profiles $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProfilesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProfilesPeer::TABLE_NAME);

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

		return BasePeer::doValidate(ProfilesPeer::DATABASE_NAME, ProfilesPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Profiles
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ProfilesPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ProfilesPeer::DATABASE_NAME);
		$criteria->add(ProfilesPeer::PROFILES_ID, $pk);

		$v = ProfilesPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(ProfilesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ProfilesPeer::DATABASE_NAME);
			$criteria->add(ProfilesPeer::PROFILES_ID, $pks, Criteria::IN);
			$objs = ProfilesPeer::doSelect($criteria, $con);
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
	  return array(array('profiles_name'), array('profiles_email'), array('profiles_path'));
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
	    return sprintf('BaseProfilesPeer:%s:%1$s', 'Count' == $match[1] ? 'doCount' : $match[0]);
	  }
	
	  throw new LogicException(sprintf('Unrecognized function "%s"', $method));
	}

} // BaseProfilesPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProfilesPeer::buildTableMap();

