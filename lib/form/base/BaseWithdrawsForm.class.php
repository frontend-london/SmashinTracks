<?php

/**
 * Withdraws form base class.
 *
 * @method Withdraws getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWithdrawsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'withdraws_id'             => new sfWidgetFormInputHidden(),
      'profiles_id'              => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => false)),
      'withdraws_paypal_address' => new sfWidgetFormInputText(),
      'withdraws_date'           => new sfWidgetFormDateTime(),
      'withdraws_saldo_value'    => new sfWidgetFormInputText(),
      'withdraws_status'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'withdraws_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getWithdrawsId()), 'empty_value' => $this->getObject()->getWithdrawsId(), 'required' => false)),
      'profiles_id'              => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id')),
      'withdraws_paypal_address' => new sfValidatorString(array('max_length' => 200)),
      'withdraws_date'           => new sfValidatorDateTime(),
      'withdraws_saldo_value'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'withdraws_status'         => new sfValidatorInteger(array('min' => -32768, 'max' => 32767)),
    ));

    $this->widgetSchema->setNameFormat('withdraws[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Withdraws';
  }


}
