<?php

/**
 * Profiles form.
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
class MyProfileMySettingsForm extends ProfilesForm
{

  public function setup()
  {
    parent::setup();
  }

  public function configure()
  {

    parent::setup();

    $this->setWidgets(array(
      'profiles_name'               => new sfWidgetFormInputText(),
      'profiles_email'              => new sfWidgetFormInputText(),
      'profiles_password'           => new sfWidgetFormInputPassword(),
      'profiles_new_password'           => new sfWidgetFormInputPassword(),
      'profiles_new_password_confirm'   => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('settings[%s]');

   

    $field = 'New password';
    $field_name = 'profiles_new_password';
    $this->validatorSchema[$field_name] = new sfValidatorString(array('required' => true), array('required' => "$field can not be empty."));
    $this->getValidator($field_name)->addOption('min_length',5);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field is too short (min %min_length% characters).");
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty.");
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");


    $field = 'Confirm new password';
    $field_name = 'profiles_new_password_confirm';
    $this->validatorSchema[$field_name] = new sfValidatorString(array('required' => true), array('required' => "$field can not be empty."));

    $field_name = 'profiles_password_confirm';
    $this->validatorSchema[$field_name] = null;

    $field_name = 'profiles_newsletter';
    $this->validatorSchema[$field_name] = null;

    $field_name = 'profiles_terms';
    $this->validatorSchema[$field_name] = null;

    $post_validators = $this->validatorSchema->getPostValidator()->getValidators();

//    $this->validatorSchema->getPostValidator()

    $this->validatorSchema->setPostValidator(
        new sfValidatorAnd(array(
            $this->validatorSchema->getPostValidator(),
            new sfValidatorSchemaCompare('profiles_password', sfValidatorSchemaCompare::EQUAL, 'profiles_password_confirm',
                array('throw_global_error' => true),
                array('invalid' => 'Your password does not match your confirmed password.')
            )
        ))
    );


  }


}





function passValidatorExtended($validator, $values)
{
  if($values['profiles_url_add_action'] || $values['profiles_url_edit_action']) { // przypadek, gdy hasło do profilu nie jest sprawdzane
      return $values; 
  } else {
      $profile = ProfilesPeer::getCurrentProfile();
      if(!empty($values['profiles_password']) && ProfilesPeer::isPassCorrect($profile->getProfilesId(), $values['profiles_password']))
      {
        return $values;
      } else {
        throw new sfValidatorError($validator, 'invalid');
      }
  }
}

class MyProfileMySettingsForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'profiles_name' => new sfWidgetFormInputText(),
      'profiles_email'                  => new sfWidgetFormInputText(),
      'profiles_password'               => new sfWidgetFormInputPassword(),
      'profiles_new_password'           => new sfWidgetFormInputPassword(),
      'profiles_new_password_confirm'   => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('settings[%s]');

    $this->setValidators(array(
      'profiles_name'   => new sfValidatorString(),
      'profiles_email'   => new sfValidatorEmail(array(), array('invalid' => "Your email is invalid.", 'required'  => "Your email can not be empty.")),
      'profiles_password'   => new sfValidatorString(array('min_length' => 5, 'trim' => true), array('min_length' => "Your password is too short (min %min_length% characters).", 'max_length' => "Your password is too long (max %max_length% characters).", 'required' => "Your password can not be empty.", 'invalid',"Your password is invalid.")),
      'profiles_new_password'   => new sfValidatorString(array('min_length' => 5, 'trim' => true), array('min_length' => "New password is too short (min %min_length% characters).", 'max_length' => "New password is too long (max %max_length% characters).", 'required' => "New password can not be empty.", 'invalid',"New password is invalid.")),
      'profiles_new_password_confirm' => new sfValidatorString(array(), array('required' => "Confirm password can not be empty.")),
    ));

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(
        array('callback'  => 'passValidatorExtended',),
        array('invalid'  => 'You have specified an incorrect password. <br />Please check your password and try again.')
    ));
  }

}