<?php


/**
 * This class defines the structure of the 'paypal_payment_info' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 01/17/12 01:36:41
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PaypalPaymentInfoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PaypalPaymentInfoTableMap';

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
		$this->setName('paypal_payment_info');
		$this->setPhpName('PaypalPaymentInfo');
		$this->setClassname('PaypalPaymentInfo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addColumn('FIRSTNAME', 'Firstname', 'VARCHAR', true, 100, '');
		$this->addColumn('LASTNAME', 'Lastname', 'VARCHAR', true, 100, '');
		$this->addColumn('BUYER_EMAIL', 'BuyerEmail', 'VARCHAR', true, 100, '');
		$this->addColumn('STREET', 'Street', 'VARCHAR', true, 100, '');
		$this->addColumn('CITY', 'City', 'VARCHAR', true, 50, '');
		$this->addColumn('STATE', 'State', 'CHAR', true, 3, '');
		$this->addColumn('ZIPCODE', 'Zipcode', 'VARCHAR', true, 11, '');
		$this->addColumn('MEMO', 'Memo', 'VARCHAR', false, 255, null);
		$this->addColumn('ITEMNAME', 'Itemname', 'VARCHAR', false, 255, null);
		$this->addColumn('ITEMNUMBER', 'Itemnumber', 'VARCHAR', false, 50, null);
		$this->addColumn('OS0', 'Os0', 'VARCHAR', false, 20, null);
		$this->addColumn('ON0', 'On0', 'VARCHAR', false, 50, null);
		$this->addColumn('OS1', 'Os1', 'VARCHAR', false, 20, null);
		$this->addColumn('ON1', 'On1', 'VARCHAR', false, 50, null);
		$this->addColumn('QUANTITY', 'Quantity', 'CHAR', false, 3, null);
		$this->addColumn('PAYMENTDATE', 'Paymentdate', 'VARCHAR', true, 50, '');
		$this->addColumn('PAYMENTTYPE', 'Paymenttype', 'VARCHAR', true, 10, '');
		$this->addPrimaryKey('TXNID', 'Txnid', 'VARCHAR', true, 30, '');
		$this->addColumn('MC_GROSS', 'McGross', 'VARCHAR', true, 6, '');
		$this->addColumn('MC_FEE', 'McFee', 'VARCHAR', true, 5, '');
		$this->addColumn('PAYMENTSTATUS', 'Paymentstatus', 'VARCHAR', true, 15, '');
		$this->addColumn('PENDINGREASON', 'Pendingreason', 'VARCHAR', false, 10, null);
		$this->addColumn('TXNTYPE', 'Txntype', 'VARCHAR', true, 10, '');
		$this->addColumn('TAX', 'Tax', 'VARCHAR', false, 10, null);
		$this->addColumn('MC_CURRENCY', 'McCurrency', 'VARCHAR', true, 5, '');
		$this->addColumn('REASONCODE', 'Reasoncode', 'VARCHAR', true, 20, '');
		$this->addColumn('CUSTOM', 'Custom', 'VARCHAR', true, 255, '');
		$this->addColumn('COUNTRY', 'Country', 'VARCHAR', true, 20, '');
		$this->addColumn('DATECREATION', 'Datecreation', 'DATE', true, null, '0000-00-00');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('PaypalCartInfo', 'PaypalCartInfo', RelationMap::ONE_TO_MANY, array('txnid' => 'txnid', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Transactions', 'Transactions', RelationMap::ONE_TO_MANY, array('txnid' => 'transactions_paypal_txnid', ), 'RESTRICT', 'RESTRICT');
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

} // PaypalPaymentInfoTableMap
