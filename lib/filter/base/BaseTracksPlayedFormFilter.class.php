<?php

/**
 * TracksPlayed filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTracksPlayedFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_id'                => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => true)),
      'tracks_played_ip_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tracks_played_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'tracks_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tracks', 'column' => 'tracks_id')),
      'tracks_played_ip_address' => new sfValidatorPass(array('required' => false)),
      'tracks_played_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('tracks_played_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksPlayed';
  }

  public function getFields()
  {
    return array(
      'tracks_played_id'         => 'Number',
      'tracks_id'                => 'ForeignKey',
      'tracks_played_ip_address' => 'Text',
      'tracks_played_date'       => 'Date',
    );
  }
}
