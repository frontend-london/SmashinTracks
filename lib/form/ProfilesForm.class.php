<?php

/**
 * Profiles form.
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
class ProfilesForm extends BaseProfilesForm
{

  public function setup()
  {
    sfValidatorBase::setDefaultMessage('required', 'This value is required.');
    sfValidatorBase::setDefaultMessage('invalid', 'This value is invalid.');
    parent::setup();
  }

  protected static $true_values = array('true', 't', 'yes', 'y', 'on', '1');


  public function configure()
  {

    $this->setWidgets(array(
      'profiles_name'               => new sfWidgetFormInputText(),
      'profiles_email'              => new sfWidgetFormInputText(),
      'profiles_password'           => new sfWidgetFormInputPassword(),
      'profiles_password_confirm'   => new sfWidgetFormInputPassword(),
      'profiles_newsletter'         => new sfWidgetFormInputCheckbox(),
    ));

    //$this->widgetSchema['profiles_newsletter'] = new sfWidgetFormInputCheckbox();


    $this->widgetSchema->setNameFormat('profiles[%s]');

    //unset($this['profiles_id'], $this['profiles_id'], $this['profiles_date'], $this['profiles_path'],$this['profiles_photo'], $this['profiles_photo'], $this['profiles_balance'], $this['profiles_deleted'], $this['profiles_password_url']);
    $this->useFields(array('profiles_name', 'profiles_email', 'profiles_password', 'profiles_password_confirm',  'profiles_newsletter'));





    /*$this->validatorSchema['profiles_name'] = new sfValidatorAnd(array(
        $this->validatorSchema['profiles_name'],
        new sfValidatorString(),
    ));*/

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
    $field_name = 'profiles_password';
    $this->getValidator($field_name)->addOption('min_length',5);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field is too short (min %min_length% characters).");
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty.");
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");


    $field = 'Confirm password';
    $field_name = 'profiles_password_confirm';
    $this->validatorSchema[$field_name] = new sfValidatorString(array('required' => true), array('required' => "$field can not be empty."));

    $field = 'Newsletter';
    $field_name = 'profiles_newsletter';
    $this->validatorSchema[$field_name] = new sfValidatorBoolean();

    $field = 'Terms';
    $field_name = 'profiles_terms';
    $this->validatorSchema[$field_name] = new sfValidatorChoice(array('choices' => array_keys(self::$true_values)), array('invalid' => 'Please read and accept the terms first.'));


    $this->validatorSchema->setPostValidator(
      new sfValidatorSchemaCompare('profiles_password', sfValidatorSchemaCompare::EQUAL, 'profiles_password_confirm',
        array('throw_global_error' => true),
        array('invalid' => 'Your password does not match your confirmed password.')
      )
    );


/*
$this->setValidators(array(
    'domain_url'            => new sfValidatorAnd(array(
      new sfValidatorUrl(array('required'  => true), array('required'  => 'Domain url is required.', 'invalid' => 'Domain url is invalid.')),
      new sfValidatorCallback(array('callback' => array($this, 'checkDomainUrl')), array('invalid' => ' This domain url already in use.'))
    ),
      array('required' => true),
      array('invalid' => 'Domain url is invalid.',
            'required' => 'Domain url in required.')
    )));
*/

//    $this->setValidators(array(
//      'profiles_name'    =>  new sfValidatorAnd(array(
//          $this->validatorSchema['profiles_name'],
//          new sfValidatorString(
//            array(
//              'required' => true,
//              'min_length' => 5
//              ),
//            array(
//              'required'   => 'Your name can not be empty.',
//              'min_length'   => 'Your name is too short (min 5 characters ).'
//              )
//            )
//          )),
//      'profiles_email'    =>  new sfValidatorAnd(array(
//          $this->validatorSchema['profiles_email'],
//          new sfValidatorEmail(array('required' => true), array(
//              'invalid' => 'Invalid email address.',
//              'required'   => 'Email can not be empty.'
//              ))
//          )),
//      'profiles_password'    =>  new sfValidatorAnd(array(
//          $this->validatorSchema['profiles_password'],
//          new sfValidatorPass(array('required' => true), array('required'   => 'Your name can not be empty.',))
//          )),
//      'profiles_newsletter' => new sfValidatorString(array('required' => true), array(
//        //array('min_length' => 4)  ,'min_length' => 'The message "%value%" is too short. It must be of %min_length% characters at least.',
//        'required'   => 'Content can not be empty.'
//      )),
//
//    ));

    /*$this->setValidators(array(
//      'profiles_name'    =>  new sfValidatorAnd(array(
//          $this->validatorSchema['profiles_name'],
//          new sfValidatorString(
//            array(
//              'min_length' => 5,
//
//            ),
//            array(
//              'min_length'   => 'Your name is too short (min 5 characters ).',
//              'max_length'   => 'Your name is too long (max 5 characters ).'
//            )
//          )
//      ), array('required' => true,), array('required'   => 'Your name can not be empty.',)),
      'profiles_email'    =>  new sfValidatorAnd(array(
          $this->validatorSchema['profiles_email'],
          new sfValidatorEmail(array('required' => true), array(
              'invalid' => 'Invalid email address.',
              'required'   => 'Email can not be empty.'
              ))
          )),
      'profiles_password'    =>  new sfValidatorAnd(array(
          $this->validatorSchema['profiles_password'],
          new sfValidatorPass(array('required' => true), array('required'   => 'Your name can not be empty.',))
          )),
      'profiles_newsletter' => new sfValidatorString(array('required' => true), array(
        //array('min_length' => 4)  ,'min_length' => 'The message "%value%" is too short. It must be of %min_length% characters at least.',
        'required'   => 'Content can not be empty.'
      )),

    ));*/

    //$this->getValidator('profiles_name')->setMessage('max_length',"Username is invalid (outer error).");
    //print_r($this->getValidator('profiles_name')->getValidators());
    //$this->getValidator('profiles_name')->get

/*
    $this->setValidators(array(
      'profiles_name'               =>  new sfValidatorString(
            array(
              'required'                => true,
              'trim'                    => true,
              'min_length'              => 5
              ),
            array(
              'required'            => 'Your name can not be empty.',
              'min_length'          => 'Your name is too short (min 5 characters ).'
              )
          ),
      'profiles_email'              =>  new sfValidatorEmail(array('required' => true), array(
              'invalid'                 => 'Invalid email address.',
              'required'                => 'Email can not be empty.'
          )),
      'profiles_password'           => new sfValidatorPass(array('required' => true), array('required'   => 'Your name can not be empty.')),
      'profiles_password_confirm'   => new sfValidatorString(array('required' => true), array('required'   => 'Your name can not be empty.')),
      'profiles_newsletter'         => new sfValidatorString(array('required' => true), array(
        //array('min_length' => 4)  ,'min_length' => 'The message "%value%" is too short. It must be of %min_length% characters at least.',
        'required'                      => 'Content can not be empty.'
      )),

    ));
*/
    //$this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('profiles_password', sfValidatorSchemaCompare::EQUAL, 'profiles_password_confirm'));

    /*$this->validatorSchema->setPostValidator(
      new sfValidatorSchemaCompare('profiles_password', sfValidatorSchemaCompare::EQUAL, 'profiles_password_confirm',
        array('throw_global_error' => true),
        array('invalid' => 'Your password dose not match your confirmed password.')
      )
    );*/

  }


}
