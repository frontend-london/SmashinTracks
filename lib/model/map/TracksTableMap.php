<?php


/**
 * This class defines the structure of the 'tracks' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/18/11 13:19:21
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TracksTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TracksTableMap';

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
		$this->setName('tracks');
		$this->setPhpName('Tracks');
		$this->setClassname('Tracks');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRACKS_ID', 'TracksId', 'INTEGER', true, 11, null);
		$this->addColumn('TRACKS_TITLE', 'TracksTitle', 'VARCHAR', true, 200, null);
		$this->addColumn('TRACKS_ARTIST', 'TracksArtist', 'VARCHAR', true, 200, null);
		$this->addForeignKey('PROFILES_ID', 'ProfilesId', 'INTEGER', 'profiles', 'PROFILES_ID', true, 11, null);
		$this->addColumn('TRACKS_PATH', 'TracksPath', 'VARCHAR', true, 200, null);
		$this->addColumn('TRACKS_TIME', 'TracksTime', 'INTEGER', true, 11, null);
		$this->addColumn('TRACKS_ACCEPTED', 'TracksAccepted', 'TINYINT', true, 1, 0);
		$this->addColumn('TRACKS_DATE', 'TracksDate', 'TIMESTAMP', true, null, null);
		$this->addColumn('TRACKS_DELETED', 'TracksDeleted', 'TINYINT', true, 1, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Profiles', 'Profiles', RelationMap::MANY_TO_ONE, array('profiles_id' => 'profiles_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('ProfilesBaskets', 'ProfilesBaskets', RelationMap::ONE_TO_MANY, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('ProfilesWishlists', 'ProfilesWishlists', RelationMap::ONE_TO_MANY, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TracksGenres', 'TracksGenres', RelationMap::ONE_TO_MANY, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TracksPlayed', 'TracksPlayed', RelationMap::ONE_TO_MANY, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TracksRecommends', 'TracksRecommends', RelationMap::ONE_TO_MANY, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TransactionsTracks', 'TransactionsTracks', RelationMap::ONE_TO_MANY, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
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

} // TracksTableMap
