<?php


/**
 * This class defines the structure of the 'transactions_tracks' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/18/11 13:19:23
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TransactionsTracksTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TransactionsTracksTableMap';

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
		$this->setName('transactions_tracks');
		$this->setPhpName('TransactionsTracks');
		$this->setClassname('TransactionsTracks');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRANSACTIONS_TRACKS_ID', 'TransactionsTracksId', 'INTEGER', true, 11, null);
		$this->addForeignKey('TRANSACTIONS_ID', 'TransactionsId', 'INTEGER', 'transactions', 'TRANSACTIONS_ID', true, 11, null);
		$this->addForeignKey('TRACKS_ID', 'TracksId', 'INTEGER', 'tracks', 'TRACKS_ID', true, 11, null);
		$this->addColumn('TRANSACTIONS_TRACKS_PATH', 'TransactionsTracksPath', 'VARCHAR', true, 32, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Transactions', 'Transactions', RelationMap::MANY_TO_ONE, array('transactions_id' => 'transactions_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Tracks', 'Tracks', RelationMap::MANY_TO_ONE, array('tracks_id' => 'tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TransactionsSaldo', 'TransactionsSaldo', RelationMap::ONE_TO_MANY, array('transactions_tracks_id' => 'transactions_tracks_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TransactionsTracksDownloads', 'TransactionsTracksDownloads', RelationMap::ONE_TO_MANY, array('transactions_tracks_id' => 'transactions_tracks_id', ), 'RESTRICT', 'RESTRICT');
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

} // TransactionsTracksTableMap
