<?php

/**
 * TracksVotes form base class.
 *
 * @method TracksVotes getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTracksVotesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_votes_id'   => new sfWidgetFormInputHidden(),
      'tracks_id'         => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => false)),
      'profiles_id'       => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => false)),
      'tracks_votes_date' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'tracks_votes_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getTracksVotesId()), 'empty_value' => $this->getObject()->getTracksVotesId(), 'required' => false)),
      'tracks_id'         => new sfValidatorPropelChoice(array('model' => 'Tracks', 'column' => 'tracks_id')),
      'profiles_id'       => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_votes_date' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tracks_votes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksVotes';
  }


}
