<?php

function passValidator($validator, $values)
{
  $profile = ProfilesPeer::getCurrentProfile();
  if(ProfilesPeer::isPassCorrect($profile->getProfilesId(), $values['profiles_old_password']))
  {
    return $values;
  } else {
    throw new sfValidatorError($validator, 'invalid');
  }
}

/**
 * Profiles form.
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
class MyProfileMySettingsForm extends BaseProfilesForm
{

  public function setup()
  {
    parent::setup();
    sfValidatorBase::setDefaultMessage('required', 'This value is required.');
    sfValidatorBase::setDefaultMessage('invalid', 'This value is invalid.');
    $this->useFields(array('profiles_name', 'profiles_email', 'profiles_password'));
  }

  public function configure()
  {

    $this->setWidgets(array(
      'profiles_name'                   => new sfWidgetFormInputText(),
      'profiles_email'                  => new sfWidgetFormInputText(),
      'profiles_old_password'           => new sfWidgetFormInputPassword(),
      'profiles_password'               => new sfWidgetFormInputPassword(),
      'profiles_password_confirm'       => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('settings[%s]');

    $field = 'Your name';
    $field_name = 'profiles_name';
    $this->getValidator($field_name)->addOption('min_length',5);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field is too short (min %min_length% characters).");
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty."); // addMessage
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");

    $field = 'Your email';
    $field_name = 'profiles_email';
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty."); // addMessage
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");
    $this->validatorSchema[$field_name] = new sfValidatorAnd(array(
        $this->validatorSchema[$field_name],
        new sfValidatorEmail(array(), array('invalid' => "$field is invalid.")),
    ), array('required' => true,), array('required'  => "$field can not be empty.",
    ));

    $field = 'Your password';
    $field_name = 'profiles_old_password';
    $this->validatorSchema[$field_name] = new sfValidatorString(array('required' => true), array('required' => "$field can not be empty."));
    $this->getValidator($field_name)->addOption('min_length',5);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field is too short (min %min_length% characters).");
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty.");
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");

    $field = 'New password';
    $field_name = 'profiles_password';
    $this->getValidator($field_name)->addOption('min_length',5);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field is too short (min %min_length% characters).");
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty.");
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");

    $field = 'Confirm new password';
    $field_name = 'profiles_password_confirm';
    $this->validatorSchema[$field_name] = new sfValidatorString(array('required' => true), array('required' => "$field can not be empty."));


    $post_validators = $this->validatorSchema->getPostValidator()->getValidators();
    foreach($post_validators as $post_validator) {
        if(get_class($post_validator)=='sfValidatorPropelUnique') {
            $columns = $post_validator->getOption('column');
            if($columns[0]=='profiles_name') {
                $post_validator->setMessage('invalid', 'Selected name is already in use.');
            } elseif($columns[0]=='profiles_email') {
                $post_validator->setMessage('invalid', 'Selected email is already in use.');
            }
        }

    }
    $this->validatorSchema->setPostValidator(
        new sfValidatorAnd(array(
            $this->validatorSchema->getPostValidator(),
            new sfValidatorCallback(
                    array('callback'  => 'passValidator',),
                    array('invalid'  => 'You have specified an incorrect password. <br />Please check your password and try again.')
                ),
            new sfValidatorSchemaCompare('profiles_password', sfValidatorSchemaCompare::EQUAL, 'profiles_password_confirm',
                array('throw_global_error' => true),
                array('invalid' => 'Your password does not match your confirmed password.')
            )
        ))
    );

  }
}
