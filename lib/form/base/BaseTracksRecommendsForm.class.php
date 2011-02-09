<?php

/**
 * TracksRecommends form base class.
 *
 * @method TracksRecommends getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTracksRecommendsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_recommends_id'     => new sfWidgetFormInputHidden(),
      'tracks_id'                => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => false)),
      'tracks_recommends_order'  => new sfWidgetFormInputText(),
      'tracks_recommends_active' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'tracks_recommends_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getTracksRecommendsId()), 'empty_value' => $this->getObject()->getTracksRecommendsId(), 'required' => false)),
      'tracks_id'                => new sfValidatorPropelChoice(array('model' => 'Tracks', 'column' => 'tracks_id')),
      'tracks_recommends_order'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'tracks_recommends_active' => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
    ));

    $this->widgetSchema->setNameFormat('tracks_recommends[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TracksRecommends';
  }


}
