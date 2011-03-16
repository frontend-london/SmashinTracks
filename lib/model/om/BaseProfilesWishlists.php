<?php

/**
 * Base class that represents a row from the 'profiles_wishlists' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/16/11 08:33:18
 *
 * @package    lib.model.om
 */
abstract class BaseProfilesWishlists extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProfilesWishlistsPeer
	 */
	protected static $peer;

	/**
	 * The value for the profiles_wishlists_id field.
	 * @var        int
	 */
	protected $profiles_wishlists_id;

	/**
	 * The value for the profiles_id field.
	 * @var        int
	 */
	protected $profiles_id;

	/**
	 * The value for the tracks_id field.
	 * @var        int
	 */
	protected $tracks_id;

	/**
	 * The value for the profiles_wishlists_date field.
	 * @var        string
	 */
	protected $profiles_wishlists_date;

	/**
	 * @var        Profiles
	 */
	protected $aProfiles;

	/**
	 * @var        Tracks
	 */
	protected $aTracks;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'ProfilesWishlistsPeer';

	/**
	 * Get the [profiles_wishlists_id] column value.
	 * 
	 * @return     int
	 */
	public function getProfilesWishlistsId()
	{
		return $this->profiles_wishlists_id;
	}

	/**
	 * Get the [profiles_id] column value.
	 * 
	 * @return     int
	 */
	public function getProfilesId()
	{
		return $this->profiles_id;
	}

	/**
	 * Get the [tracks_id] column value.
	 * 
	 * @return     int
	 */
	public function getTracksId()
	{
		return $this->tracks_id;
	}

	/**
	 * Get the [optionally formatted] temporal [profiles_wishlists_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getProfilesWishlistsDate($format = 'Y-m-d H:i:s')
	{
		if ($this->profiles_wishlists_date === null) {
			return null;
		}


		if ($this->profiles_wishlists_date === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->profiles_wishlists_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->profiles_wishlists_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [profiles_wishlists_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProfilesWishlists The current object (for fluent API support)
	 */
	public function setProfilesWishlistsId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->profiles_wishlists_id !== $v) {
			$this->profiles_wishlists_id = $v;
			$this->modifiedColumns[] = ProfilesWishlistsPeer::PROFILES_WISHLISTS_ID;
		}

		return $this;
	} // setProfilesWishlistsId()

	/**
	 * Set the value of [profiles_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProfilesWishlists The current object (for fluent API support)
	 */
	public function setProfilesId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->profiles_id !== $v) {
			$this->profiles_id = $v;
			$this->modifiedColumns[] = ProfilesWishlistsPeer::PROFILES_ID;
		}

		if ($this->aProfiles !== null && $this->aProfiles->getProfilesId() !== $v) {
			$this->aProfiles = null;
		}

		return $this;
	} // setProfilesId()

	/**
	 * Set the value of [tracks_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ProfilesWishlists The current object (for fluent API support)
	 */
	public function setTracksId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tracks_id !== $v) {
			$this->tracks_id = $v;
			$this->modifiedColumns[] = ProfilesWishlistsPeer::TRACKS_ID;
		}

		if ($this->aTracks !== null && $this->aTracks->getTracksId() !== $v) {
			$this->aTracks = null;
		}

		return $this;
	} // setTracksId()

	/**
	 * Sets the value of [profiles_wishlists_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     ProfilesWishlists The current object (for fluent API support)
	 */
	public function setProfilesWishlistsDate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->profiles_wishlists_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->profiles_wishlists_date !== null && $tmpDt = new DateTime($this->profiles_wishlists_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->profiles_wishlists_date = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = ProfilesWishlistsPeer::PROFILES_WISHLISTS_DATE;
			}
		} // if either are not null

		return $this;
	} // setProfilesWishlistsDate()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->profiles_wishlists_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->profiles_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->tracks_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->profiles_wishlists_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = ProfilesWishlistsPeer::NUM_COLUMNS - ProfilesWishlistsPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ProfilesWishlists object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aProfiles !== null && $this->profiles_id !== $this->aProfiles->getProfilesId()) {
			$this->aProfiles = null;
		}
		if ($this->aTracks !== null && $this->tracks_id !== $this->aTracks->getTracksId()) {
			$this->aTracks = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProfilesWishlistsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProfilesWishlistsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aProfiles = null;
			$this->aTracks = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProfilesWishlistsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseProfilesWishlists:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				ProfilesWishlistsPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseProfilesWishlists:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ProfilesWishlistsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseProfilesWishlists:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseProfilesWishlists:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ProfilesWishlistsPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aProfiles !== null) {
				if ($this->aProfiles->isModified() || $this->aProfiles->isNew()) {
					$affectedRows += $this->aProfiles->save($con);
				}
				$this->setProfiles($this->aProfiles);
			}

			if ($this->aTracks !== null) {
				if ($this->aTracks->isModified() || $this->aTracks->isNew()) {
					$affectedRows += $this->aTracks->save($con);
				}
				$this->setTracks($this->aTracks);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ProfilesWishlistsPeer::PROFILES_WISHLISTS_ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ProfilesWishlistsPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setProfilesWishlistsId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ProfilesWishlistsPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aProfiles !== null) {
				if (!$this->aProfiles->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProfiles->getValidationFailures());
				}
			}

			if ($this->aTracks !== null) {
				if (!$this->aTracks->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTracks->getValidationFailures());
				}
			}


			if (($retval = ProfilesWishlistsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProfilesWishlistsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getProfilesWishlistsId();
				break;
			case 1:
				return $this->getProfilesId();
				break;
			case 2:
				return $this->getTracksId();
				break;
			case 3:
				return $this->getProfilesWishlistsDate();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ProfilesWishlistsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getProfilesWishlistsId(),
			$keys[1] => $this->getProfilesId(),
			$keys[2] => $this->getTracksId(),
			$keys[3] => $this->getProfilesWishlistsDate(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ProfilesWishlistsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setProfilesWishlistsId($value);
				break;
			case 1:
				$this->setProfilesId($value);
				break;
			case 2:
				$this->setTracksId($value);
				break;
			case 3:
				$this->setProfilesWishlistsDate($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ProfilesWishlistsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setProfilesWishlistsId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProfilesId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTracksId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setProfilesWishlistsDate($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ProfilesWishlistsPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProfilesWishlistsPeer::PROFILES_WISHLISTS_ID)) $criteria->add(ProfilesWishlistsPeer::PROFILES_WISHLISTS_ID, $this->profiles_wishlists_id);
		if ($this->isColumnModified(ProfilesWishlistsPeer::PROFILES_ID)) $criteria->add(ProfilesWishlistsPeer::PROFILES_ID, $this->profiles_id);
		if ($this->isColumnModified(ProfilesWishlistsPeer::TRACKS_ID)) $criteria->add(ProfilesWishlistsPeer::TRACKS_ID, $this->tracks_id);
		if ($this->isColumnModified(ProfilesWishlistsPeer::PROFILES_WISHLISTS_DATE)) $criteria->add(ProfilesWishlistsPeer::PROFILES_WISHLISTS_DATE, $this->profiles_wishlists_date);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ProfilesWishlistsPeer::DATABASE_NAME);

		$criteria->add(ProfilesWishlistsPeer::PROFILES_WISHLISTS_ID, $this->profiles_wishlists_id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getProfilesWishlistsId();
	}

	/**
	 * Generic method to set the primary key (profiles_wishlists_id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setProfilesWishlistsId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of ProfilesWishlists (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setProfilesId($this->profiles_id);

		$copyObj->setTracksId($this->tracks_id);

		$copyObj->setProfilesWishlistsDate($this->profiles_wishlists_date);


		$copyObj->setNew(true);

		$copyObj->setProfilesWishlistsId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     ProfilesWishlists Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ProfilesWishlistsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProfilesWishlistsPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Profiles object.
	 *
	 * @param      Profiles $v
	 * @return     ProfilesWishlists The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProfiles(Profiles $v = null)
	{
		if ($v === null) {
			$this->setProfilesId(NULL);
		} else {
			$this->setProfilesId($v->getProfilesId());
		}

		$this->aProfiles = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Profiles object, it will not be re-added.
		if ($v !== null) {
			$v->addProfilesWishlists($this);
		}

		return $this;
	}


	/**
	 * Get the associated Profiles object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Profiles The associated Profiles object.
	 * @throws     PropelException
	 */
	public function getProfiles(PropelPDO $con = null)
	{
		if ($this->aProfiles === null && ($this->profiles_id !== null)) {
			$this->aProfiles = ProfilesPeer::retrieveByPk($this->profiles_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aProfiles->addProfilesWishlistss($this);
			 */
		}
		return $this->aProfiles;
	}

	/**
	 * Declares an association between this object and a Tracks object.
	 *
	 * @param      Tracks $v
	 * @return     ProfilesWishlists The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTracks(Tracks $v = null)
	{
		if ($v === null) {
			$this->setTracksId(NULL);
		} else {
			$this->setTracksId($v->getTracksId());
		}

		$this->aTracks = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Tracks object, it will not be re-added.
		if ($v !== null) {
			$v->addProfilesWishlists($this);
		}

		return $this;
	}


	/**
	 * Get the associated Tracks object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Tracks The associated Tracks object.
	 * @throws     PropelException
	 */
	public function getTracks(PropelPDO $con = null)
	{
		if ($this->aTracks === null && ($this->tracks_id !== null)) {
			$this->aTracks = TracksPeer::retrieveByPk($this->tracks_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aTracks->addProfilesWishlistss($this);
			 */
		}
		return $this->aTracks;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aProfiles = null;
			$this->aTracks = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseProfilesWishlists:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseProfilesWishlists::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseProfilesWishlists
