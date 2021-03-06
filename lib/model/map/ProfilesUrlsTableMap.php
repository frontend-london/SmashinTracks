<?php


/**
 * This class defines the structure of the 'profiles_urls' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/18/13 06:55:49
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ProfilesUrlsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProfilesUrlsTableMap';

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
		$this->setName('profiles_urls');
		$this->setPhpName('ProfilesUrls');
		$this->setClassname('ProfilesUrls');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('PROFILES_URLS_ID', 'ProfilesUrlsId', 'INTEGER', true, 11, null);
		$this->addForeignKey('PROFILES_ID', 'ProfilesId', 'INTEGER', 'profiles', 'PROFILES_ID', true, 11, null);
		$this->addColumn('PROFILES_URLS_URL', 'ProfilesUrlsUrl', 'VARCHAR', true, 200, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Profiles', 'Profiles', RelationMap::MANY_TO_ONE, array('profiles_id' => 'profiles_id', ), 'RESTRICT', 'RESTRICT');
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

} // ProfilesUrlsTableMap
