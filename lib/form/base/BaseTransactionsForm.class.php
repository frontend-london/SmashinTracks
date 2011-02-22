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
      'transactions_id'           => new sfWidgetFormInputHidden(),
      'transactions_date'         => new sfWidgetFormDateTime(),
      'transactions_paymethod'    => new sfWidgetFormInputText(),
      'transactions_paypal_txnid' => new sfWidgetFormPropelChoice(array('model' => 'PaypalPaymentInfo', 'add_empty' => true)),
      'transactions_done'         => new sfWidgetFormInputText(),
      'profiles_id'               => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'transactions_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getTransactionsId()), 'empty_value' => $this->getObject()->getTransactionsId(), 'required' => false)),
      'transactions_date'         => new sfValidatorDateTime(),
      'transactions_paymethod'    => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'transactions_paypal_txnid' => new sfValidatorPropelChoice(array('model' => 'PaypalPaymentInfo', 'column' => 'txnid', 'required' => false)),
      'transactions_done'         => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'profiles_id'               => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id', 'required' => false)),
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
