<?php

function loginValidator($validator, $values)
{
  if(ProfilesPeer::isLoginCorrect($values['email'], $values['password']))
  {
    return $values;
  } else {
    throw new sfValidatorError($validator, 'invalid');
  } 
}

class LoginForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'email'       => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputText(),
      'remember_me' => new sfWidgetFormInputCheckbox(),
    ));

    $this->widgetSchema->setNameFormat('login[%s]');

    $this->setValidators(array(
      'email'   => new sfValidatorEmail(array('required' => true), array(
          'invalid' => 'Invalid email address.',
          'required'   => 'Email can not be empty.'
      )),
      'password' => new sfValidatorString(array('required' => true), array('required' => 'Password is required.')),
      'remember_me' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(
        array('callback'  => 'loginValidator',),
        array('invalid'  => 'E-mail address not found, or password incorrect. For an instant e-mail reminder, please click <strong>\'Forgot password?\'</strong> below.')
    ));
  }

}