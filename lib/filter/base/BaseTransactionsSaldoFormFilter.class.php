<?php

/**
 * TransactionsSaldo filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTransactionsSaldoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_tracks_id'   => new sfWidgetFormPropelChoice(array('model' => 'TransactionsTracks', 'add_empty' => true)),
      'profiles_id'              => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'transactions_saldo_value' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'transactions_tracks_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TransactionsTracks', 'column' => 'transactions_tracks_id')),
      'profiles_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'transactions_saldo_value' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('transactions_saldo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransactionsSaldo';
  }

  public function getFields()
  {
    return array(
      'transactions_saldo_id'    => 'Number',
      'transactions_tracks_id'   => 'ForeignKey',
      'profiles_id'              => 'ForeignKey',
      'transactions_saldo_value' => 'Number',
    );
  }
}
