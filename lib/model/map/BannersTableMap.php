<?php


/**
 * This class defines the structure of the 'banners' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 05/09/11 23:55:17
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class BannersTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.BannersTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('banners');
		$this->setPhpName('Banners');
		$this->setClassname('Banners');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('BANNERS_ID', 'BannersId', 'INTEGER', true, 11, null);
		$this->addColumn('BANNERS_TYPE', 'BannersType', 'SMALLINT', true, 6, null);
		$this->addColumn('BANNERS_PATH', 'BannersPath', 'VARCHAR', true, 32, null);
		$this->addColumn('BANNERS_URL', 'BannersUrl', 'VARCHAR', true, 200, null);
		$this->addColumn('BANNERS_ORDER', 'BannersOrder', 'INTEGER', true, 11, null);
		$this->addColumn('BANNERS_ACTIVE', 'BannersActive', 'TINYINT', true, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // BannersTableMap
