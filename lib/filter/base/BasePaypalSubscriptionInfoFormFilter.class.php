<?php

/**
 * PaypalSubscriptionInfo filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BasePaypalSubscriptionInfoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'subscr_id'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sub_event'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subscr_date'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subscr_effective'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'period1'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'period2'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'period3'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount1'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount2'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount3'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mc_amount1'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mc_amount2'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mc_amount3'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'recurring'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reattempt'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'retry_at'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'recur_times'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'                    => new sfWidgetFormFilterInput(),
      'payment_txn_id'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subscriber_emailaddress'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datecreation'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'subscr_id'                   => new sfValidatorPass(array('required' => false)),
      'sub_event'                   => new sfValidatorPass(array('required' => false)),
      'subscr_date'                 => new sfValidatorPass(array('required' => false)),
      'subscr_effective'            => new sfValidatorPass(array('required' => false)),
      'period1'                     => new sfValidatorPass(array('required' => false)),
      'period2'                     => new sfValidatorPass(array('required' => false)),
      'period3'                     => new sfValidatorPass(array('required' => false)),
      'amount1'                     => new sfValidatorPass(array('required' => false)),
      'amount2'                     => new sfValidatorPass(array('required' => false)),
      'amount3'                     => new sfValidatorPass(array('required' => false)),
      'mc_amount1'                  => new sfValidatorPass(array('required' => false)),
      'mc_amount2'                  => new sfValidatorPass(array('required' => false)),
      'mc_amount3'                  => new sfValidatorPass(array('required' => false)),
      'recurring'                   => new sfValidatorPass(array('required' => false)),
      'reattempt'                   => new sfValidatorPass(array('required' => false)),
      'retry_at'                    => new sfValidatorPass(array('required' => false)),
      'recur_times'                 => new sfValidatorPass(array('required' => false)),
      'username'                    => new sfValidatorPass(array('required' => false)),
      'password'                    => new sfValidatorPass(array('required' => false)),
      'payment_txn_id'              => new sfValidatorPass(array('required' => false)),
      'subscriber_emailaddress'     => new sfValidatorPass(array('required' => false)),
      'datecreation'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('paypal_subscription_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaypalSubscriptionInfo';
  }

  public function getFields()
  {
    return array(
      'paypal_subscription_info_id' => 'Number',
      'subscr_id'                   => 'Text',
      'sub_event'                   => 'Text',
      'subscr_date'                 => 'Text',
      'subscr_effective'            => 'Text',
      'period1'                     => 'Text',
      'period2'                     => 'Text',
      'period3'                     => 'Text',
      'amount1'                     => 'Text',
      'amount2'                     => 'Text',
      'amount3'                     => 'Text',
      'mc_amount1'                  => 'Text',
      'mc_amount2'                  => 'Text',
      'mc_amount3'                  => 'Text',
      'recurring'                   => 'Text',
      'reattempt'                   => 'Text',
      'retry_at'                    => 'Text',
      'recur_times'                 => 'Text',
      'username'                    => 'Text',
      'password'                    => 'Text',
      'payment_txn_id'              => 'Text',
      'subscriber_emailaddress'     => 'Text',
      'datecreation'                => 'Date',
    );
  }
}
