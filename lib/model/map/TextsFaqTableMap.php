<?php


/**
 * This class defines the structure of the 'texts_faq' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 03/14/11 14:46:10
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TextsFaqTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TextsFaqTableMap';

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
		$this->setName('texts_faq');
		$this->setPhpName('TextsFaq');
		$this->setClassname('TextsFaq');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TEXTS_FAQ_ID', 'TextsFaqId', 'INTEGER', true, 11, null);
		$this->addColumn('TEXTS_FAQ_QUESTION', 'TextsFaqQuestion', 'VARCHAR', true, 300, null);
		$this->addColumn('TEXTS_FAQ_ANSWER', 'TextsFaqAnswer', 'LONGVARCHAR', true, null, null);
		$this->addColumn('TEXTS_FAQ_ORDER', 'TextsFaqOrder', 'INTEGER', true, 11, null);
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

} // TextsFaqTableMap
