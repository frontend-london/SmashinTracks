<?php

/**
 * Profiles form base class.
 *
 * @method Profiles getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProfilesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_id'           => new sfWidgetFormInputHidden(),
      'profiles_name'         => new sfWidgetFormInputText(),
      'profiles_email'        => new sfWidgetFormInputText(),
      'profiles_password'     => new sfWidgetFormInputText(),
      'profiles_text'         => new sfWidgetFormInputText(),
      'profiles_date'         => new sfWidgetFormDateTime(),
      'profiles_photo_path'   => new sfWidgetFormInputText(),
      'profiles_balance'      => new sfWidgetFormInputText(),
      'profiles_blocked'      => new sfWidgetFormInputText(),
      'profiles_deleted'      => new sfWidgetFormInputText(),
      'profiles_password_url' => new sfWidgetFormInputText(),
      'profiles_newsletter'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'profiles_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getProfilesId()), 'empty_value' => $this->getObject()->getProfilesId(), 'required' => false)),
      'profiles_name'         => new sfValidatorString(array('max_length' => 200)),
      'profiles_email'        => new sfValidatorString(array('max_length' => 200)),
      'profiles_password'     => new sfValidatorString(array('max_length' => 32)),
      'profiles_text'         => new sfValidatorString(array('max_length' => 500)),
      'profiles_date'         => new sfValidatorDateTime(),
      'profiles_photo_path'   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'profiles_balance'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'profiles_blocked'      => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'profiles_deleted'      => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'profiles_password_url' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'profiles_newsletter'   => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Profiles', 'column' => array('profiles_name'))),
        new sfValidatorPropelUnique(array('model' => 'Profiles', 'column' => array('profiles_email'))),
        new sfValidatorPropelUnique(array('model' => 'Profiles', 'column' => array('profiles_photo_path'))),
      ))
    );

    $this->widgetSchema->setNameFormat('profiles[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profiles';
  }


}
