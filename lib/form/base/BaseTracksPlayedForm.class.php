<?php

/**
 * TracksPlayed form base class.
 *
 * @method TracksPlayed getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTracksPlayedForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_played_id'         => new sfWidgetFormInputHidden(),
      'tracks_id'                => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => false)),
      'tracks_played_ip_address' => new sfWidgetFormInputText(),
      'tracks_played_date'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'tracks_played_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getTracksPlayedId()), 'empty_value' => $this->getObject()->getTracksPlayedId(), 'required' => false)),
      'tracks_id'                => new sfValidatorPropelChoice(array('model' => 'Tracks', 'column' => 'tracks_id')),
      'tracks_played_ip_address' => new sfValidatorString(array('max_length' => 15)),
      'tracks_played_date'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tracks_played[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksPlayed';
  }


}
