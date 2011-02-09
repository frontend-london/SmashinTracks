<?php

/**
 * TransactionsTracksDownloads form base class.
 *
 * @method TransactionsTracksDownloads getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTransactionsTracksDownloadsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_tracks_downloads_id'   => new sfWidgetFormInputHidden(),
      'transactions_tracks_id'             => new sfWidgetFormPropelChoice(array('model' => 'TransactionsTracks', 'add_empty' => false)),
      'transactions_tracks_downloads_date' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'transactions_tracks_downloads_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getTransactionsTracksDownloadsId()), 'empty_value' => $this->getObject()->getTransactionsTracksDownloadsId(), 'required' => false)),
      'transactions_tracks_id'             => new sfValidatorPropelChoice(array('model' => 'TransactionsTracks', 'column' => 'transactions_tracks_id')),
      'transactions_tracks_downloads_date' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('transactions_tracks_downloads[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransactionsTracksDownloads';
  }


}
