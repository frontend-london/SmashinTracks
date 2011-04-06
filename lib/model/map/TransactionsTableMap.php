<?php


/**
 * This class defines the structure of the 'transactions' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 04/06/11 11:53:14
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TransactionsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TransactionsTableMap';

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
		$this->setName('transactions');
		$this->setPhpName('Transactions');
		$this->setClassname('Transactions');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TRANSACTIONS_ID', 'TransactionsId', 'INTEGER', true, 11, null);
		$this->addColumn('TRANSACTIONS_DATE', 'TransactionsDate', 'TIMESTAMP', true, null, null);
		$this->addColumn('TRANSACTIONS_PAYMETHOD', 'TransactionsPaymethod', 'SMALLINT', false, 6, null);
		$this->addForeignKey('TRANSACTIONS_PAYPAL_TXNID', 'TransactionsPaypalTxnid', 'VARCHAR', 'paypal_payment_info', 'TXNID', false, 30, null);
		$this->addColumn('TRANSACTIONS_DONE', 'TransactionsDone', 'TINYINT', true, 1, 0);
		$this->addForeignKey('PROFILES_ID', 'ProfilesId', 'INTEGER', 'profiles', 'PROFILES_ID', false, 11, null);
		$this->addColumn('TRANSACTIONS_PATH', 'TransactionsPath', 'VARCHAR', false, 32, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('PaypalPaymentInfo', 'PaypalPaymentInfo', RelationMap::MANY_TO_ONE, array('transactions_paypal_txnid' => 'txnid', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Profiles', 'Profiles', RelationMap::MANY_TO_ONE, array('profiles_id' => 'profiles_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('TransactionsTracks', 'TransactionsTracks', RelationMap::ONE_TO_MANY, array('transactions_id' => 'transactions_id', ), 'RESTRICT', 'RESTRICT');
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

} // TransactionsTableMap
