<?php

/**
 * PaypalPaymentInfo form base class.
 *
 * @method PaypalPaymentInfo getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BasePaypalPaymentInfoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      'buyer_email'   => new sfWidgetFormInputText(),
      'street'        => new sfWidgetFormInputText(),
      'city'          => new sfWidgetFormInputText(),
      'state'         => new sfWidgetFormInputText(),
      'zipcode'       => new sfWidgetFormInputText(),
      'memo'          => new sfWidgetFormInputText(),
      'itemname'      => new sfWidgetFormInputText(),
      'itemnumber'    => new sfWidgetFormInputText(),
      'os0'           => new sfWidgetFormInputText(),
      'on0'           => new sfWidgetFormInputText(),
      'os1'           => new sfWidgetFormInputText(),
      'on1'           => new sfWidgetFormInputText(),
      'quantity'      => new sfWidgetFormInputText(),
      'paymentdate'   => new sfWidgetFormInputText(),
      'paymenttype'   => new sfWidgetFormInputText(),
      'txnid'         => new sfWidgetFormInputHidden(),
      'mc_gross'      => new sfWidgetFormInputText(),
      'mc_fee'        => new sfWidgetFormInputText(),
      'paymentstatus' => new sfWidgetFormInputText(),
      'pendingreason' => new sfWidgetFormInputText(),
      'txntype'       => new sfWidgetFormInputText(),
      'tax'           => new sfWidgetFormInputText(),
      'mc_currency'   => new sfWidgetFormInputText(),
      'reasoncode'    => new sfWidgetFormInputText(),
      'custom'        => new sfWidgetFormInputText(),
      'country'       => new sfWidgetFormInputText(),
      'datecreation'  => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'firstname'     => new sfValidatorString(array('max_length' => 100)),
      'lastname'      => new sfValidatorString(array('max_length' => 100)),
      'buyer_email'   => new sfValidatorString(array('max_length' => 100)),
      'street'        => new sfValidatorString(array('max_length' => 100)),
      'city'          => new sfValidatorString(array('max_length' => 50)),
      'state'         => new sfValidatorString(array('max_length' => 3)),
      'zipcode'       => new sfValidatorString(array('max_length' => 11)),
      'memo'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'itemname'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'itemnumber'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'os0'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'on0'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'os1'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'on1'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'quantity'      => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'paymentdate'   => new sfValidatorString(array('max_length' => 50)),
      'paymenttype'   => new sfValidatorString(array('max_length' => 10)),
      'txnid'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getTxnid()), 'empty_value' => $this->getObject()->getTxnid(), 'required' => false)),
      'mc_gross'      => new sfValidatorString(array('max_length' => 6)),
      'mc_fee'        => new sfValidatorString(array('max_length' => 5)),
      'paymentstatus' => new sfValidatorString(array('max_length' => 15)),
      'pendingreason' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'txntype'       => new sfValidatorString(array('max_length' => 10)),
      'tax'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'mc_currency'   => new sfValidatorString(array('max_length' => 5)),
      'reasoncode'    => new sfValidatorString(array('max_length' => 20)),
      'custom'        => new sfValidatorString(array('max_length' => 255)),
      'country'       => new sfValidatorString(array('max_length' => 20)),
      'datecreation'  => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('paypal_payment_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaypalPaymentInfo';
  }


}
