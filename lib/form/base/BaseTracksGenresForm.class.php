<?php

/**
 * TracksGenres form base class.
 *
 * @method TracksGenres getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTracksGenresForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_genres_id' => new sfWidgetFormInputHidden(),
      'tracks_id'        => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => false)),
      'genres_id'        => new sfWidgetFormPropelChoice(array('model' => 'Genres', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'tracks_genres_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getTracksGenresId()), 'empty_value' => $this->getObject()->getTracksGenresId(), 'required' => false)),
      'tracks_id'        => new sfValidatorPropelChoice(array('model' => 'Tracks', 'column' => 'tracks_id')),
      'genres_id'        => new sfValidatorPropelChoice(array('model' => 'Genres', 'column' => 'genres_id')),
    ));

    $this->widgetSchema->setNameFormat('tracks_genres[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksGenres';
  }


}
