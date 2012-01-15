<?php

/**
 * TransactionsTracksDownloads filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTransactionsTracksDownloadsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'transactions_tracks_id'             => new sfWidgetFormPropelChoice(array('model' => 'TransactionsTracks', 'add_empty' => true)),
      'transactions_tracks_downloads_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'transactions_tracks_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TransactionsTracks', 'column' => 'transactions_tracks_id')),
      'transactions_tracks_downloads_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('transactions_tracks_downloads_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TransactionsTracksDownloads';
  }

  public function getFields()
  {
    return array(
      'transactions_tracks_downloads_id'   => 'Number',
      'transactions_tracks_id'             => 'ForeignKey',
      'transactions_tracks_downloads_date' => 'Date',
    );
  }
}
