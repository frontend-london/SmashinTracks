<?php

/**
 * TracksRecommends filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTracksRecommendsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_id'                => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => true)),
      'tracks_recommends_order'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tracks_recommends_active' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tracks_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tracks', 'column' => 'tracks_id')),
      'tracks_recommends_order'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tracks_recommends_active' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tracks_recommends_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksRecommends';
  }

  public function getFields()
  {
    return array(
      'tracks_recommends_id'     => 'Number',
      'tracks_id'                => 'ForeignKey',
      'tracks_recommends_order'  => 'Number',
      'tracks_recommends_active' => 'Number',
    );
  }
}
