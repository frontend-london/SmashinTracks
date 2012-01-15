<?php

/**
 * TransactionsTracks filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTransactionsTracksFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_id'          => new sfWidgetFormPropelChoice(array('model' => 'Transactions', 'add_empty' => true)),
      'tracks_id'                => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => true)),
      'transactions_tracks_path' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'transactions_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Transactions', 'column' => 'transactions_id')),
      'tracks_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tracks', 'column' => 'tracks_id')),
      'transactions_tracks_path' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('transactions_tracks_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransactionsTracks';
  }

  public function getFields()
  {
    return array(
      'transactions_tracks_id'   => 'Number',
      'transactions_id'          => 'ForeignKey',
      'tracks_id'                => 'ForeignKey',
      'transactions_tracks_path' => 'Text',
    );
  }
}
