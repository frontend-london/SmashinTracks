<?php

/**
 * PaypalPaymentInfo filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePaypalPaymentInfoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'firstname'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'buyer_email'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'street'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'state'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zipcode'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'memo'          => new sfWidgetFormFilterInput(),
      'itemname'      => new sfWidgetFormFilterInput(),
      'itemnumber'    => new sfWidgetFormFilterInput(),
      'os0'           => new sfWidgetFormFilterInput(),
      'on0'           => new sfWidgetFormFilterInput(),
      'os1'           => new sfWidgetFormFilterInput(),
      'on1'           => new sfWidgetFormFilterInput(),
      'quantity'      => new sfWidgetFormFilterInput(),
      'paymentdate'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'paymenttype'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mc_gross'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mc_fee'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'paymentstatus' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pendingreason' => new sfWidgetFormFilterInput(),
      'txntype'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tax'           => new sfWidgetFormFilterInput(),
      'mc_currency'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reasoncode'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'custom'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'datecreation'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'firstname'     => new sfValidatorPass(array('required' => false)),
      'lastname'      => new sfValidatorPass(array('required' => false)),
      'buyer_email'   => new sfValidatorPass(array('required' => false)),
      'street'        => new sfValidatorPass(array('required' => false)),
      'city'          => new sfValidatorPass(array('required' => false)),
      'state'         => new sfValidatorPass(array('required' => false)),
      'zipcode'       => new sfValidatorPass(array('required' => false)),
      'memo'          => new sfValidatorPass(array('required' => false)),
      'itemname'      => new sfValidatorPass(array('required' => false)),
      'itemnumber'    => new sfValidatorPass(array('required' => false)),
      'os0'           => new sfValidatorPass(array('required' => false)),
      'on0'           => new sfValidatorPass(array('required' => false)),
      'os1'           => new sfValidatorPass(array('required' => false)),
      'on1'           => new sfValidatorPass(array('required' => false)),
      'quantity'      => new sfValidatorPass(array('required' => false)),
      'paymentdate'   => new sfValidatorPass(array('required' => false)),
      'paymenttype'   => new sfValidatorPass(array('required' => false)),
      'mc_gross'      => new sfValidatorPass(array('required' => false)),
      'mc_fee'        => new sfValidatorPass(array('required' => false)),
      'paymentstatus' => new sfValidatorPass(array('required' => false)),
      'pendingreason' => new sfValidatorPass(array('required' => false)),
      'txntype'       => new sfValidatorPass(array('required' => false)),
      'tax'           => new sfValidatorPass(array('required' => false)),
      'mc_currency'   => new sfValidatorPass(array('required' => false)),
      'reasoncode'    => new sfValidatorPass(array('required' => false)),
      'custom'        => new sfValidatorPass(array('required' => false)),
      'country'       => new sfValidatorPass(array('required' => false)),
      'datecreation'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('paypal_payment_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaypalPaymentInfo';
  }

  public function getFields()
  {
    return array(
      'firstname'     => 'Text',
      'lastname'      => 'Text',
      'buyer_email'   => 'Text',
      'street'        => 'Text',
      'city'          => 'Text',
      'state'         => 'Text',
      'zipcode'       => 'Text',
      'memo'          => 'Text',
      'itemname'      => 'Text',
      'itemnumber'    => 'Text',
      'os0'           => 'Text',
      'on0'           => 'Text',
      'os1'           => 'Text',
      'on1'           => 'Text',
      'quantity'      => 'Text',
      'paymentdate'   => 'Text',
      'paymenttype'   => 'Text',
      'txnid'         => 'Text',
      'mc_gross'      => 'Text',
      'mc_fee'        => 'Text',
      'paymentstatus' => 'Text',
      'pendingreason' => 'Text',
      'txntype'       => 'Text',
      'tax'           => 'Text',
      'mc_currency'   => 'Text',
      'reasoncode'    => 'Text',
      'custom'        => 'Text',
      'country'       => 'Text',
      'datecreation'  => 'Date',
    );
  }
}
