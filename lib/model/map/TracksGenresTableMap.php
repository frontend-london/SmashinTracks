<?php


/**
 * This class defines the structure of the 'tracks_genres' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/02/11 10:47:35
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TracksGenresTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TracksGenresTableMap';

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
		$this->setName('tracks_genres');
		$this->setPhpName('TracksGenres');
		$this->setClassname('TracksGenres');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRACKS_GENRES_ID', 'TracksGenresId', 'INTEGER', true, 11, null);
		$this->addForeignKey('TRACKS_ID', 'TracksId', 'INTEGER', 'tracks', 'TRACKS_ID', true, 11, null);
		$this->addForeignKey('GENRES_ID', 'GenresId', 'INTEGER', 'genres', 'GENRES_ID', true, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Tracks', 'Tracks', RelationMap::MANY_TO_ONE, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Genres', 'Genres', RelationMap::MANY_TO_ONE, array('genres_id' => 'genres_id', ), 'RESTRICT', 'RESTRICT');
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

} // TracksGenresTableMap
