<?php

/**
 * TracksVotes filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTracksVotesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_id'         => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => true)),
      'profiles_id'       => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'tracks_votes_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'tracks_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tracks', 'column' => 'tracks_id')),
      'profiles_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_votes_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('tracks_votes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksVotes';
  }

  public function getFields()
  {
    return array(
      'tracks_votes_id'   => 'Number',
      'tracks_id'         => 'ForeignKey',
      'profiles_id'       => 'ForeignKey',
      'tracks_votes_date' => 'Date',
    );
  }
}
