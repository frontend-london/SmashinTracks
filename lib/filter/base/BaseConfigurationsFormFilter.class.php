<?php

/**
 * Configurations filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseConfigurationsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'configurations_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'configuratkons_value' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'configurations_name'  => new sfValidatorPass(array('required' => false)),
      'configuratkons_value' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('configurations_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Configurations';
  }

  public function getFields()
  {
    return array(
      'configurations_id'    => 'Number',
      'configurations_name'  => 'Text',
      'configuratkons_value' => 'Number',
    );
  }
}
