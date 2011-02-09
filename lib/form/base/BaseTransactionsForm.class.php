<?php

/**
 * Transactions form base class.
 *
 * @method Transactions getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTransactionsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_id'             => new sfWidgetFormInputHidden(),
      'transactions_date'           => new sfWidgetFormDateTime(),
      'transactions_paymethod'      => new sfWidgetFormInputText(),
      'transactions_paypal_address' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'transactions_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getTransactionsId()), 'empty_value' => $this->getObject()->getTransactionsId(), 'required' => false)),
      'transactions_date'           => new sfValidatorDateTime(),
      'transactions_paymethod'      => new sfValidatorInteger(array('min' => -32768, 'max' => 32767)),
      'transactions_paypal_address' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('transactions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transactions';
  }


}
