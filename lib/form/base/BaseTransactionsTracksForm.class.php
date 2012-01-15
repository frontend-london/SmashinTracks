<?php

/**
 * TransactionsTracks form base class.
 *
 * @method TransactionsTracks getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTransactionsTracksForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_tracks_id'   => new sfWidgetFormInputHidden(),
      'transactions_id'          => new sfWidgetFormPropelChoice(array('model' => 'Transactions', 'add_empty' => false)),
      'tracks_id'                => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => false)),
      'transactions_tracks_path' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'transactions_tracks_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getTransactionsTracksId()), 'empty_value' => $this->getObject()->getTransactionsTracksId(), 'required' => false)),
      'transactions_id'          => new sfValidatorPropelChoice(array('model' => 'Transactions', 'column' => 'transactions_id')),
      'tracks_id'                => new sfValidatorPropelChoice(array('model' => 'Tracks', 'column' => 'tracks_id')),
      'transactions_tracks_path' => new sfValidatorString(array('max_length' => 32)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TransactionsTracks', 'column' => array('transactions_tracks_path')))
    );

    $this->widgetSchema->setNameFormat('transactions_tracks[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransactionsTracks';
  }


}
