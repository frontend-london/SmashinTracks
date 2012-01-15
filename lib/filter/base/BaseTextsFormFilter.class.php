<?php

/**
 * Texts filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTextsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'texts_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'texts_value' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'texts_help'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'texts_name'  => new sfValidatorPass(array('required' => false)),
      'texts_value' => new sfValidatorPass(array('required' => false)),
      'texts_help'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('texts_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Texts';
  }

  public function getFields()
  {
    return array(
      'texts_id'    => 'Number',
      'texts_name'  => 'Text',
      'texts_value' => 'Text',
      'texts_help'  => 'Text',
    );
  }
}
