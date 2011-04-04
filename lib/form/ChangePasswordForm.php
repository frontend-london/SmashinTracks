<?php

class ChangePasswordForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'password'           => new sfWidgetFormInputPassword(),
      'password_confirm'   => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('change_password[%s]');

    $this->setValidators(array(
      'password' => new sfValidatorString(array('required' => true), array('required' => 'Password is required.')),
      'password_confirm' => new sfValidatorString(array('required' => true), array('required' => 'Password is required.')),
    ));


    $this->validatorSchema->setPostValidator(
        new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirm',
            array('throw_global_error' => true),
            array('invalid' => 'Your password does not match your confirmed password.')
        )
    );

  }

}