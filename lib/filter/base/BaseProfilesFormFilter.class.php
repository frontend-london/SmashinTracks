<?php

/**
 * Profiles filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseProfilesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_email'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_password'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_text'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_date'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'profiles_photo_path'   => new sfWidgetFormFilterInput(),
      'profiles_balance'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_blocked'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_deleted'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_password_url' => new sfWidgetFormFilterInput(),
      'profiles_newsletter'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'profiles_name'         => new sfValidatorPass(array('required' => false)),
      'profiles_email'        => new sfValidatorPass(array('required' => false)),
      'profiles_password'     => new sfValidatorPass(array('required' => false)),
      'profiles_text'         => new sfValidatorPass(array('required' => false)),
      'profiles_date'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'profiles_photo_path'   => new sfValidatorPass(array('required' => false)),
      'profiles_balance'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'profiles_blocked'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'profiles_deleted'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'profiles_password_url' => new sfValidatorPass(array('required' => false)),
      'profiles_newsletter'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('profiles_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profiles';
  }

  public function getFields()
  {
    return array(
      'profiles_id'           => 'Number',
      'profiles_name'         => 'Text',
      'profiles_email'        => 'Text',
      'profiles_password'     => 'Text',
      'profiles_text'         => 'Text',
      'profiles_date'         => 'Date',
      'profiles_photo_path'   => 'Text',
      'profiles_balance'      => 'Number',
      'profiles_blocked'      => 'Number',
      'profiles_deleted'      => 'Number',
      'profiles_password_url' => 'Text',
      'profiles_newsletter'   => 'Number',
    );
  }
}
