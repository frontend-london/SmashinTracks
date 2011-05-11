<?php

/**
 * Texts form base class.
 *
 * @method Texts getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTextsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'texts_id'    => new sfWidgetFormInputHidden(),
      'texts_name'  => new sfWidgetFormInputText(),
      'texts_value' => new sfWidgetFormTextarea(),
      'texts_help'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'texts_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->getTextsId()), 'empty_value' => $this->getObject()->getTextsId(), 'required' => false)),
      'texts_name'  => new sfValidatorString(array('max_length' => 45)),
      'texts_value' => new sfValidatorString(),
      'texts_help'  => new sfValidatorString(array('max_length' => 200)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Texts', 'column' => array('texts_name')))
    );

    $this->widgetSchema->setNameFormat('texts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Texts';
  }


}
