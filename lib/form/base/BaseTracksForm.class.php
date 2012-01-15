<?php

/**
 * Tracks form base class.
 *
 * @method Tracks getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTracksForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_id'       => new sfWidgetFormInputHidden(),
      'tracks_title'    => new sfWidgetFormInputText(),
      'tracks_artist'   => new sfWidgetFormInputText(),
      'profiles_id'     => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => false)),
      'tracks_path'     => new sfWidgetFormInputText(),
      'tracks_time'     => new sfWidgetFormInputText(),
      'tracks_accepted' => new sfWidgetFormInputText(),
      'tracks_date'     => new sfWidgetFormDateTime(),
      'tracks_deleted'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'tracks_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getTracksId()), 'empty_value' => $this->getObject()->getTracksId(), 'required' => false)),
      'tracks_title'    => new sfValidatorString(array('max_length' => 200)),
      'tracks_artist'   => new sfValidatorString(array('max_length' => 200)),
      'profiles_id'     => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_path'     => new sfValidatorString(array('max_length' => 200)),
      'tracks_time'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'tracks_accepted' => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'tracks_date'     => new sfValidatorDateTime(),
      'tracks_deleted'  => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tracks', 'column' => array('tracks_path')))
    );

    $this->widgetSchema->setNameFormat('tracks[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tracks';
  }


}
