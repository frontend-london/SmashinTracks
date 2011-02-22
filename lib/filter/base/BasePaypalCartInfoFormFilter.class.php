<?php

/**
 * PaypalCartInfo filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePaypalCartInfoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'txnid'               => new sfWidgetFormPropelChoice(array('model' => 'PaypalPaymentInfo', 'add_empty' => true)),
      'itemname'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'itemnumber'          => new sfWidgetFormFilterInput(),
      'os0'                 => new sfWidgetFormFilterInput(),
      'on0'                 => new sfWidgetFormFilterInput(),
      'os1'                 => new sfWidgetFormFilterInput(),
      'on1'                 => new sfWidgetFormFilterInput(),
      'quantity'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'invoice'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'custom'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'txnid'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PaypalPaymentInfo', 'column' => 'txnid')),
      'itemname'            => new sfValidatorPass(array('required' => false)),
      'itemnumber'          => new sfValidatorPass(array('required' => false)),
      'os0'                 => new sfValidatorPass(array('required' => false)),
      'on0'                 => new sfValidatorPass(array('required' => false)),
      'os1'                 => new sfValidatorPass(array('required' => false)),
      'on1'                 => new sfValidatorPass(array('required' => false)),
      'quantity'            => new sfValidatorPass(array('required' => false)),
      'invoice'             => new sfValidatorPass(array('required' => false)),
      'custom'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('paypal_cart_info_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaypalCartInfo';
  }

  public function getFields()
  {
    return array(
      'paypal_cart_info_id' => 'Number',
      'txnid'               => 'ForeignKey',
      'itemname'            => 'Text',
      'itemnumber'          => 'Text',
      'os0'                 => 'Text',
      'on0'                 => 'Text',
      'os1'                 => 'Text',
      'on1'                 => 'Text',
      'quantity'            => 'Text',
      'invoice'             => 'Text',
      'custom'              => 'Text',
    );
  }
}
