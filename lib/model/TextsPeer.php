<?php


/**
 * Skeleton subclass for performing query and update operations on the 'texts' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:22
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TextsPeer extends BaseTextsPeer {

    static public function doSelectText($name) {
      $criteria = new Criteria();
      $criteria->add(TextsPeer::TEXTS_NAME, $name);
      return TextsPeer::doSelectOne($criteria);
    }

    static public function getTextValue($name) {
      return self::doSelectText($name)->getTextsValue();
    }


} // TextsPeer
