<?php

/**
 * PaypalCartInfo form base class.
 *
 * @method PaypalCartInfo getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePaypalCartInfoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'paypal_cart_info_id' => new sfWidgetFormInputHidden(),
      'txnid'               => new sfWidgetFormPropelChoice(array('model' => 'PaypalPaymentInfo', 'add_empty' => false)),
      'itemname'            => new sfWidgetFormInputText(),
      'itemnumber'          => new sfWidgetFormInputText(),
      'os0'                 => new sfWidgetFormInputText(),
      'on0'                 => new sfWidgetFormInputText(),
      'os1'                 => new sfWidgetFormInputText(),
      'on1'                 => new sfWidgetFormInputText(),
      'quantity'            => new sfWidgetFormInputText(),
      'invoice'             => new sfWidgetFormInputText(),
      'custom'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'paypal_cart_info_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getPaypalCartInfoId()), 'empty_value' => $this->getObject()->getPaypalCartInfoId(), 'required' => false)),
      'txnid'               => new sfValidatorPropelChoice(array('model' => 'PaypalPaymentInfo', 'column' => 'txnid')),
      'itemname'            => new sfValidatorString(array('max_length' => 255)),
      'itemnumber'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'os0'                 => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'on0'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'os1'                 => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'on1'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'quantity'            => new sfValidatorString(array('max_length' => 3)),
      'invoice'             => new sfValidatorString(array('max_length' => 255)),
      'custom'              => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('paypal_cart_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaypalCartInfo';
  }


}
