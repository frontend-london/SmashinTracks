<?php


/**
 * This class defines the structure of the 'transactions_tracks_downloads' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/02/11 10:47:37
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TransactionsTracksDownloadsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TransactionsTracksDownloadsTableMap';

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
		$this->setName('transactions_tracks_downloads');
		$this->setPhpName('TransactionsTracksDownloads');
		$this->setClassname('TransactionsTracksDownloads');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRANSACTIONS_TRACKS_DOWNLOADS_ID', 'TransactionsTracksDownloadsId', 'INTEGER', true, 11, null);
		$this->addForeignKey('TRANSACTIONS_TRACKS_ID', 'TransactionsTracksId', 'INTEGER', 'transactions_tracks', 'TRANSACTIONS_TRACKS_ID', true, 11, null);
		$this->addColumn('TRANSACTIONS_TRACKS_DOWNLOADS_DATE', 'TransactionsTracksDownloadsDate', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('TransactionsTracks', 'TransactionsTracks', RelationMap::MANY_TO_ONE, array('transactions_tracks_id' => 'transactions_tracks_id', ), 'RESTRICT', 'RESTRICT');
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

} // TransactionsTracksDownloadsTableMap
