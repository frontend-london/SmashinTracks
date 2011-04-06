<?php

/**
 * ProfilesViewed filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseProfilesViewedFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_id'                => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'profiles_viewed_ip_address' => new sfWidgetFormFilterInput(),
      'profiles_viewed_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'profiles_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'profiles_viewed_ip_address' => new sfValidatorPass(array('required' => false)),
      'profiles_viewed_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('profiles_viewed_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesViewed';
  }

  public function getFields()
  {
    return array(
      'profiles_viewed_id'         => 'Number',
      'profiles_id'                => 'ForeignKey',
      'profiles_viewed_ip_address' => 'Text',
      'profiles_viewed_date'       => 'Date',
    );
  }
}
