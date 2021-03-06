<?php


/**
 * This class defines the structure of the 'paypal_cart_info' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/18/13 06:55:48
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PaypalCartInfoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PaypalCartInfoTableMap';

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
		$this->setName('paypal_cart_info');
		$this->setPhpName('PaypalCartInfo');
		$this->setClassname('PaypalCartInfo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('PAYPAL_CART_INFO_ID', 'PaypalCartInfoId', 'INTEGER', true, 11, null);
		$this->addForeignKey('TXNID', 'Txnid', 'VARCHAR', 'paypal_payment_info', 'TXNID', true, 30, '');
		$this->addColumn('ITEMNAME', 'Itemname', 'VARCHAR', true, 255, '');
		$this->addColumn('ITEMNUMBER', 'Itemnumber', 'VARCHAR', false, 50, null);
		$this->addColumn('OS0', 'Os0', 'VARCHAR', false, 20, null);
		$this->addColumn('ON0', 'On0', 'VARCHAR', false, 50, null);
		$this->addColumn('OS1', 'Os1', 'VARCHAR', false, 20, null);
		$this->addColumn('ON1', 'On1', 'VARCHAR', false, 50, null);
		$this->addColumn('QUANTITY', 'Quantity', 'CHAR', true, 3, '');
		$this->addColumn('INVOICE', 'Invoice', 'VARCHAR', true, 255, '');
		$this->addColumn('CUSTOM', 'Custom', 'VARCHAR', true, 255, '');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('PaypalPaymentInfo', 'PaypalPaymentInfo', RelationMap::MANY_TO_ONE, array('txnid' => 'txnid', ), 'RESTRICT', 'RESTRICT');
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

} // PaypalCartInfoTableMap
