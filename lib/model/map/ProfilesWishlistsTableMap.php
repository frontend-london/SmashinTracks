<?php


/**
 * This class defines the structure of the 'profiles_wishlists' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 04/06/11 20:21:06
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ProfilesWishlistsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ProfilesWishlistsTableMap';

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
		$this->setName('profiles_wishlists');
		$this->setPhpName('ProfilesWishlists');
		$this->setClassname('ProfilesWishlists');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('PROFILES_WISHLISTS_ID', 'ProfilesWishlistsId', 'INTEGER', true, 11, null);
		$this->addForeignKey('PROFILES_ID', 'ProfilesId', 'INTEGER', 'profiles', 'PROFILES_ID', true, 11, null);
		$this->addForeignKey('TRACKS_ID', 'TracksId', 'INTEGER', 'tracks', 'TRACKS_ID', true, 11, null);
		$this->addColumn('PROFILES_WISHLISTS_DATE', 'ProfilesWishlistsDate', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Profiles', 'Profiles', RelationMap::MANY_TO_ONE, array('profiles_id' => 'profiles_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Tracks', 'Tracks', RelationMap::MANY_TO_ONE, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
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

} // ProfilesWishlistsTableMap
