<?php

/**
 * Banners form base class.
 *
 * @method Banners getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseBannersForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'banners_id'     => new sfWidgetFormInputHidden(),
      'banners_type'   => new sfWidgetFormInputText(),
      'banners_path'   => new sfWidgetFormInputText(),
      'banners_url'    => new sfWidgetFormInputText(),
      'banners_order'  => new sfWidgetFormInputText(),
      'banners_active' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'banners_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getBannersId()), 'empty_value' => $this->getObject()->getBannersId(), 'required' => false)),
      'banners_type'   => new sfValidatorInteger(array('min' => -32768, 'max' => 32767)),
      'banners_path'   => new sfValidatorString(array('max_length' => 32)),
      'banners_url'    => new sfValidatorString(array('max_length' => 200)),
      'banners_order'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'banners_active' => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Banners', 'column' => array('banners_path')))
    );

    $this->widgetSchema->setNameFormat('banners[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banners';
  }


}
