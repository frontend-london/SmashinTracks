<?php

/**
 * TracksGenres filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTracksGenresFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_id'        => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => true)),
      'genres_id'        => new sfWidgetFormPropelChoice(array('model' => 'Genres', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tracks_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tracks', 'column' => 'tracks_id')),
      'genres_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Genres', 'column' => 'genres_id')),
    ));

    $this->widgetSchema->setNameFormat('tracks_genres_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksGenres';
  }

  public function getFields()
  {
    return array(
      'tracks_genres_id' => 'Number',
      'tracks_id'        => 'ForeignKey',
      'genres_id'        => 'ForeignKey',
    );
  }
}
