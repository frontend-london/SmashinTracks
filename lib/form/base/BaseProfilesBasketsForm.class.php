<?php

/**
 * ProfilesBaskets form base class.
 *
 * @method ProfilesBaskets getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProfilesBasketsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_baskets_id' => new sfWidgetFormInputHidden(),
      'profiles_id'         => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => false)),
      'tracks_id'           => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'profiles_baskets_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getProfilesBasketsId()), 'empty_value' => $this->getObject()->getProfilesBasketsId(), 'required' => false)),
      'profiles_id'         => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_id'           => new sfValidatorPropelChoice(array('model' => 'Tracks', 'column' => 'tracks_id')),
    ));

    $this->widgetSchema->setNameFormat('profiles_baskets[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesBaskets';
  }


}
