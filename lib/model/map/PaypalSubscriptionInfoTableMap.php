<?php


/**
 * This class defines the structure of the 'paypal_subscription_info' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/15/11 14:04:24
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PaypalSubscriptionInfoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PaypalSubscriptionInfoTableMap';

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
		$this->setName('paypal_subscription_info');
		$this->setPhpName('PaypalSubscriptionInfo');
		$this->setClassname('PaypalSubscriptionInfo');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('PAYPAL_SUBSCRIPTION_INFO_ID', 'PaypalSubscriptionInfoId', 'INTEGER', true, 11, null);
		$this->addColumn('SUBSCR_ID', 'SubscrId', 'VARCHAR', true, 255, '');
		$this->addColumn('SUB_EVENT', 'SubEvent', 'VARCHAR', true, 50, '');
		$this->addColumn('SUBSCR_DATE', 'SubscrDate', 'VARCHAR', true, 255, '');
		$this->addColumn('SUBSCR_EFFECTIVE', 'SubscrEffective', 'VARCHAR', true, 255, '');
		$this->addColumn('PERIOD1', 'Period1', 'VARCHAR', true, 255, '');
		$this->addColumn('PERIOD2', 'Period2', 'VARCHAR', true, 255, '');
		$this->addColumn('PERIOD3', 'Period3', 'VARCHAR', true, 255, '');
		$this->addColumn('AMOUNT1', 'Amount1', 'VARCHAR', true, 255, '');
		$this->addColumn('AMOUNT2', 'Amount2', 'VARCHAR', true, 255, '');
		$this->addColumn('AMOUNT3', 'Amount3', 'VARCHAR', true, 255, '');
		$this->addColumn('MC_AMOUNT1', 'McAmount1', 'VARCHAR', true, 255, '');
		$this->addColumn('MC_AMOUNT2', 'McAmount2', 'VARCHAR', true, 255, '');
		$this->addColumn('MC_AMOUNT3', 'McAmount3', 'VARCHAR', true, 255, '');
		$this->addColumn('RECURRING', 'Recurring', 'VARCHAR', true, 255, '');
		$this->addColumn('REATTEMPT', 'Reattempt', 'VARCHAR', true, 255, '');
		$this->addColumn('RETRY_AT', 'RetryAt', 'VARCHAR', true, 255, '');
		$this->addColumn('RECUR_TIMES', 'RecurTimes', 'VARCHAR', true, 255, '');
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 255, '');
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', false, 255, null);
		$this->addColumn('PAYMENT_TXN_ID', 'PaymentTxnId', 'VARCHAR', true, 50, '');
		$this->addColumn('SUBSCRIBER_EMAILADDRESS', 'SubscriberEmailaddress', 'VARCHAR', true, 255, '');
		$this->addColumn('DATECREATION', 'Datecreation', 'DATE', true, null, '0000-00-00');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
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

} // PaypalSubscriptionInfoTableMap
