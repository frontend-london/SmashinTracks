<?php

/**
 * PaypalSubscriptionInfo form base class.
 *
 * @method PaypalSubscriptionInfo getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePaypalSubscriptionInfoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'paypal_subscription_info_id' => new sfWidgetFormInputHidden(),
      'subscr_id'                   => new sfWidgetFormInputText(),
      'sub_event'                   => new sfWidgetFormInputText(),
      'subscr_date'                 => new sfWidgetFormInputText(),
      'subscr_effective'            => new sfWidgetFormInputText(),
      'period1'                     => new sfWidgetFormInputText(),
      'period2'                     => new sfWidgetFormInputText(),
      'period3'                     => new sfWidgetFormInputText(),
      'amount1'                     => new sfWidgetFormInputText(),
      'amount2'                     => new sfWidgetFormInputText(),
      'amount3'                     => new sfWidgetFormInputText(),
      'mc_amount1'                  => new sfWidgetFormInputText(),
      'mc_amount2'                  => new sfWidgetFormInputText(),
      'mc_amount3'                  => new sfWidgetFormInputText(),
      'recurring'                   => new sfWidgetFormInputText(),
      'reattempt'                   => new sfWidgetFormInputText(),
      'retry_at'                    => new sfWidgetFormInputText(),
      'recur_times'                 => new sfWidgetFormInputText(),
      'username'                    => new sfWidgetFormInputText(),
      'password'                    => new sfWidgetFormInputText(),
      'payment_txn_id'              => new sfWidgetFormInputText(),
      'subscriber_emailaddress'     => new sfWidgetFormInputText(),
      'datecreation'                => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'paypal_subscription_info_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getPaypalSubscriptionInfoId()), 'empty_value' => $this->getObject()->getPaypalSubscriptionInfoId(), 'required' => false)),
      'subscr_id'                   => new sfValidatorString(array('max_length' => 255)),
      'sub_event'                   => new sfValidatorString(array('max_length' => 50)),
      'subscr_date'                 => new sfValidatorString(array('max_length' => 255)),
      'subscr_effective'            => new sfValidatorString(array('max_length' => 255)),
      'period1'                     => new sfValidatorString(array('max_length' => 255)),
      'period2'                     => new sfValidatorString(array('max_length' => 255)),
      'period3'                     => new sfValidatorString(array('max_length' => 255)),
      'amount1'                     => new sfValidatorString(array('max_length' => 255)),
      'amount2'                     => new sfValidatorString(array('max_length' => 255)),
      'amount3'                     => new sfValidatorString(array('max_length' => 255)),
      'mc_amount1'                  => new sfValidatorString(array('max_length' => 255)),
      'mc_amount2'                  => new sfValidatorString(array('max_length' => 255)),
      'mc_amount3'                  => new sfValidatorString(array('max_length' => 255)),
      'recurring'                   => new sfValidatorString(array('max_length' => 255)),
      'reattempt'                   => new sfValidatorString(array('max_length' => 255)),
      'retry_at'                    => new sfValidatorString(array('max_length' => 255)),
      'recur_times'                 => new sfValidatorString(array('max_length' => 255)),
      'username'                    => new sfValidatorString(array('max_length' => 255)),
      'password'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'payment_txn_id'              => new sfValidatorString(array('max_length' => 50)),
      'subscriber_emailaddress'     => new sfValidatorString(array('max_length' => 255)),
      'datecreation'                => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('paypal_subscription_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaypalSubscriptionInfo';
  }


}
