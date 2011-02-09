<?php

/**
 * Transactions filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTransactionsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'transactions_paymethod'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'transactions_paypal_address' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'transactions_date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'transactions_paymethod'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'transactions_paypal_address' => new sfValidatorPass(array('required' => false)),
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
      'transactions_id'             => 'Number',
      'transactions_date'           => 'Date',
      'transactions_paymethod'      => 'Number',
      'transactions_paypal_address' => 'Text',
    );
  }
}
