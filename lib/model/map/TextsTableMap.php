<?php


/**
 * This class defines the structure of the 'texts' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 01/17/12 01:36:43
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TextsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TextsTableMap';

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
		$this->setName('texts');
		$this->setPhpName('Texts');
		$this->setClassname('Texts');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('TEXTS_ID', 'TextsId', 'INTEGER', true, 11, null);
		$this->addColumn('TEXTS_NAME', 'TextsName', 'VARCHAR', true, 45, null);
		$this->addColumn('TEXTS_VALUE', 'TextsValue', 'LONGVARCHAR', true, null, null);
		$this->addColumn('TEXTS_HELP', 'TextsHelp', 'VARCHAR', true, 200, null);
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

} // TextsTableMap
