<?php


/**
 * This class defines the structure of the 'tracks_recommends' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 01/17/12 01:36:45
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TracksRecommendsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TracksRecommendsTableMap';

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
		$this->setName('tracks_recommends');
		$this->setPhpName('TracksRecommends');
		$this->setClassname('TracksRecommends');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRACKS_RECOMMENDS_ID', 'TracksRecommendsId', 'INTEGER', true, 11, null);
		$this->addForeignKey('TRACKS_ID', 'TracksId', 'INTEGER', 'tracks', 'TRACKS_ID', true, 11, null);
		$this->addColumn('TRACKS_RECOMMENDS_ORDER', 'TracksRecommendsOrder', 'INTEGER', true, 11, null);
		$this->addColumn('TRACKS_RECOMMENDS_ACTIVE', 'TracksRecommendsActive', 'TINYINT', true, 1, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
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

} // TracksRecommendsTableMap
