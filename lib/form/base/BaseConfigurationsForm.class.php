<?php

/**
 * Configurations form base class.
 *
 * @method Configurations getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseConfigurationsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'configurations_id'    => new sfWidgetFormInputHidden(),
      'configurations_name'  => new sfWidgetFormInputText(),
      'configuratkons_value' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'configurations_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->getConfigurationsId()), 'empty_value' => $this->getObject()->getConfigurationsId(), 'required' => false)),
      'configurations_name'  => new sfValidatorString(array('max_length' => 45)),
      'configuratkons_value' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Configurations', 'column' => array('configurations_name')))
    );

    $this->widgetSchema->setNameFormat('configurations[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configurations';
  }


}
