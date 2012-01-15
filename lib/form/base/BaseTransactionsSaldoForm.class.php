<?php

/**
 * TransactionsSaldo form base class.
 *
 * @method TransactionsSaldo getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTransactionsSaldoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_saldo_id'    => new sfWidgetFormInputHidden(),
      'transactions_tracks_id'   => new sfWidgetFormPropelChoice(array('model' => 'TransactionsTracks', 'add_empty' => false)),
      'profiles_id'              => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'transactions_saldo_value' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'transactions_saldo_id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->getTransactionsSaldoId()), 'empty_value' => $this->getObject()->getTransactionsSaldoId(), 'required' => false)),
      'transactions_tracks_id'   => new sfValidatorPropelChoice(array('model' => 'TransactionsTracks', 'column' => 'transactions_tracks_id')),
      'profiles_id'              => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id', 'required' => false)),
      'transactions_saldo_value' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('transactions_saldo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransactionsSaldo';
  }


}
