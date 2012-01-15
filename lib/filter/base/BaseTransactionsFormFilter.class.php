<?php

/**
 * Transactions filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTransactionsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'transactions_paymethod'    => new sfWidgetFormFilterInput(),
      'transactions_paypal_txnid' => new sfWidgetFormPropelChoice(array('model' => 'PaypalPaymentInfo', 'add_empty' => true)),
      'transactions_done'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_id'               => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'transactions_path'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'transactions_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'transactions_paymethod'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'transactions_paypal_txnid' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PaypalPaymentInfo', 'column' => 'txnid')),
      'transactions_done'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'profiles_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'transactions_path'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('transactions_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transactions';
  }

  public function getFields()
  {
    return array(
      'transactions_id'           => 'Number',
      'transactions_date'         => 'Date',
      'transactions_paymethod'    => 'Number',
      'transactions_paypal_txnid' => 'ForeignKey',
      'transactions_done'         => 'Number',
      'profiles_id'               => 'ForeignKey',
      'transactions_path'         => 'Text',
    );
  }
}
