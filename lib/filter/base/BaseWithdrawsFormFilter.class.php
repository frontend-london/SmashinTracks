<?php

/**
 * Withdraws filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseWithdrawsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_id'              => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'withdraws_paypal_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'withdraws_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'withdraws_saldo_value'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'withdraws_status'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'profiles_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'withdraws_paypal_address' => new sfValidatorPass(array('required' => false)),
      'withdraws_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'withdraws_saldo_value'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'withdraws_status'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('withdraws_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Withdraws';
  }

  public function getFields()
  {
    return array(
      'withdraws_id'             => 'Number',
      'profiles_id'              => 'ForeignKey',
      'withdraws_paypal_address' => 'Text',
      'withdraws_date'           => 'Date',
      'withdraws_saldo_value'    => 'Number',
      'withdraws_status'         => 'Number',
    );
  }
}
