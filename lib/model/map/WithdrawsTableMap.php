<?php


/**
 * This class defines the structure of the 'withdraws' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/13/11 15:28:07
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class WithdrawsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.WithdrawsTableMap';

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
		$this->setName('withdraws');
		$this->setPhpName('Withdraws');
		$this->setClassname('Withdraws');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('WITHDRAWS_ID', 'WithdrawsId', 'INTEGER', true, 11, null);
		$this->addForeignKey('PROFILES_ID', 'ProfilesId', 'INTEGER', 'profiles', 'PROFILES_ID', true, 11, null);
		$this->addColumn('WITHDRAWS_PAYPAL_ADDRESS', 'WithdrawsPaypalAddress', 'VARCHAR', true, 200, null);
		$this->addColumn('WITHDRAWS_DATE', 'WithdrawsDate', 'TIMESTAMP', true, null, null);
		$this->addColumn('WITHDRAWS_SALDO_VALUE', 'WithdrawsSaldoValue', 'INTEGER', true, 11, null);
		$this->addColumn('WITHDRAWS_STATUS', 'WithdrawsStatus', 'SMALLINT', true, 6, 0);
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

} // WithdrawsTableMap
