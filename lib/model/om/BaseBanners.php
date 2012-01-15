<?php

/**
 * Base class that represents a row from the 'banners' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 12/20/11 00:27:55
 *
 * @package    lib.model.om
 */
abstract class BaseBanners extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        BannersPeer
	 */
	protected static $peer;

	/**
	 * The value for the banners_id field.
	 * @var        int
	 */
	protected $banners_id;

	/**
	 * The value for the banners_type field.
	 * @var        int
	 */
	protected $banners_type;

	/**
	 * The value for the banners_path field.
	 * @var        string
	 */
	protected $banners_path;

	/**
	 * The value for the banners_url field.
	 * @var        string
	 */
	protected $banners_url;

	/**
	 * The value for the banners_order field.
	 * @var        int
	 */
	protected $banners_order;

	/**
	 * The value for the banners_active field.
	 * @var        int
	 */
	protected $banners_active;

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
	
	const PEER = 'BannersPeer';

	/**
	 * Get the [banners_id] column value.
	 * 
	 * @return     int
	 */
	public function getBannersId()
	{
		return $this->banners_id;
	}

	/**
	 * Get the [banners_type] column value.
	 * 
	 * @return     int
	 */
	public function getBannersType()
	{
		return $this->banners_type;
	}

	/**
	 * Get the [banners_path] column value.
	 * 
	 * @return     string
	 */
	public function getBannersPath()
	{
		return $this->banners_path;
	}

	/**
	 * Get the [banners_url] column value.
	 * 
	 * @return     string
	 */
	public function getBannersUrl()
	{
		return $this->banners_url;
	}

	/**
	 * Get the [banners_order] column value.
	 * 
	 * @return     int
	 */
	public function getBannersOrder()
	{
		return $this->banners_order;
	}

	/**
	 * Get the [banners_active] column value.
	 * 
	 * @return     int
	 */
	public function getBannersActive()
	{
		return $this->banners_active;
	}

	/**
	 * Set the value of [banners_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Banners The current object (for fluent API support)
	 */
	public function setBannersId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->banners_id !== $v) {
			$this->banners_id = $v;
			$this->modifiedColumns[] = BannersPeer::BANNERS_ID;
		}

		return $this;
	} // setBannersId()

	/**
	 * Set the value of [banners_type] column.
	 * 
	 * @param      int $v new value
	 * @return     Banners The current object (for fluent API support)
	 */
	public function setBannersType($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->banners_type !== $v) {
			$this->banners_type = $v;
			$this->modifiedColumns[] = BannersPeer::BANNERS_TYPE;
		}

		return $this;
	} // setBannersType()

	/**
	 * Set the value of [banners_path] column.
	 * 
	 * @param      string $v new value
	 * @return     Banners The current object (for fluent API support)
	 */
	public function setBannersPath($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->banners_path !== $v) {
			$this->banners_path = $v;
			$this->modifiedColumns[] = BannersPeer::BANNERS_PATH;
		}

		return $this;
	} // setBannersPath()

	/**
	 * Set the value of [banners_url] column.
	 * 
	 * @param      string $v new value
	 * @return     Banners The current object (for fluent API support)
	 */
	public function setBannersUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->banners_url !== $v) {
			$this->banners_url = $v;
			$this->modifiedColumns[] = BannersPeer::BANNERS_URL;
		}

		return $this;
	} // setBannersUrl()

	/**
	 * Set the value of [banners_order] column.
	 * 
	 * @param      int $v new value
	 * @return     Banners The current object (for fluent API support)
	 */
	public function setBannersOrder($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->banners_order !== $v) {
			$this->banners_order = $v;
			$this->modifiedColumns[] = BannersPeer::BANNERS_ORDER;
		}

		return $this;
	} // setBannersOrder()

	/**
	 * Set the value of [banners_active] column.
	 * 
	 * @param      int $v new value
	 * @return     Banners The current object (for fluent API support)
	 */
	public function setBannersActive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->banners_active !== $v) {
			$this->banners_active = $v;
			$this->modifiedColumns[] = BannersPeer::BANNERS_ACTIVE;
		}

		return $this;
	} // setBannersActive()

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

			$this->banners_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->banners_type = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->banners_path = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->banners_url = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->banners_order = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->banners_active = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 6; // 6 = BannersPeer::NUM_COLUMNS - BannersPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Banners object", $e);
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
			$con = Propel::getConnection(BannersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = BannersPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

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
			$con = Propel::getConnection(BannersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseBanners:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				BannersPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseBanners:delete:post') as $callable)
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
			$con = Propel::getConnection(BannersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseBanners:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseBanners:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				BannersPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = BannersPeer::BANNERS_ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BannersPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setBannersId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += BannersPeer::doUpdate($this, $con);
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


			if (($retval = BannersPeer::doValidate($this, $columns)) !== true) {
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
		$pos = BannersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getBannersId();
				break;
			case 1:
				return $this->getBannersType();
				break;
			case 2:
				return $this->getBannersPath();
				break;
			case 3:
				return $this->getBannersUrl();
				break;
			case 4:
				return $this->getBannersOrder();
				break;
			case 5:
				return $this->getBannersActive();
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
		$keys = BannersPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getBannersId(),
			$keys[1] => $this->getBannersType(),
			$keys[2] => $this->getBannersPath(),
			$keys[3] => $this->getBannersUrl(),
			$keys[4] => $this->getBannersOrder(),
			$keys[5] => $this->getBannersActive(),
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
		$pos = BannersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setBannersId($value);
				break;
			case 1:
				$this->setBannersType($value);
				break;
			case 2:
				$this->setBannersPath($value);
				break;
			case 3:
				$this->setBannersUrl($value);
				break;
			case 4:
				$this->setBannersOrder($value);
				break;
			case 5:
				$this->setBannersActive($value);
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
		$keys = BannersPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setBannersId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setBannersType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBannersPath($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBannersUrl($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBannersOrder($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setBannersActive($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(BannersPeer::DATABASE_NAME);

		if ($this->isColumnModified(BannersPeer::BANNERS_ID)) $criteria->add(BannersPeer::BANNERS_ID, $this->banners_id);
		if ($this->isColumnModified(BannersPeer::BANNERS_TYPE)) $criteria->add(BannersPeer::BANNERS_TYPE, $this->banners_type);
		if ($this->isColumnModified(BannersPeer::BANNERS_PATH)) $criteria->add(BannersPeer::BANNERS_PATH, $this->banners_path);
		if ($this->isColumnModified(BannersPeer::BANNERS_URL)) $criteria->add(BannersPeer::BANNERS_URL, $this->banners_url);
		if ($this->isColumnModified(BannersPeer::BANNERS_ORDER)) $criteria->add(BannersPeer::BANNERS_ORDER, $this->banners_order);
		if ($this->isColumnModified(BannersPeer::BANNERS_ACTIVE)) $criteria->add(BannersPeer::BANNERS_ACTIVE, $this->banners_active);

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
		$criteria = new Criteria(BannersPeer::DATABASE_NAME);

		$criteria->add(BannersPeer::BANNERS_ID, $this->banners_id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getBannersId();
	}

	/**
	 * Generic method to set the primary key (banners_id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setBannersId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Banners (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setBannersType($this->banners_type);

		$copyObj->setBannersPath($this->banners_path);

		$copyObj->setBannersUrl($this->banners_url);

		$copyObj->setBannersOrder($this->banners_order);

		$copyObj->setBannersActive($this->banners_active);


		$copyObj->setNew(true);

		$copyObj->setBannersId(NULL); // this is a auto-increment column, so set to default value

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
	 * @return     Banners Clone of current object.
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
	 * @return     BannersPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new BannersPeer();
		}
		return self::$peer;
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

	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseBanners:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseBanners::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseBanners
