<?php

/**
 * ProfilesViewed form base class.
 *
 * @method ProfilesViewed getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProfilesViewedForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_viewed_id'         => new sfWidgetFormInputHidden(),
      'profiles_id'                => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => false)),
      'profiles_viewed_ip_address' => new sfWidgetFormInputText(),
      'profiles_viewed_date'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'profiles_viewed_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getProfilesViewedId()), 'empty_value' => $this->getObject()->getProfilesViewedId(), 'required' => false)),
      'profiles_id'                => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id')),
      'profiles_viewed_ip_address' => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'profiles_viewed_date'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('profiles_viewed[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesViewed';
  }


}
