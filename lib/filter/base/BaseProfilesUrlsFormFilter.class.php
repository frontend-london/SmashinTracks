<?php

/**
 * ProfilesUrls filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseProfilesUrlsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_id'       => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'profiles_urls_url' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'profiles_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'profiles_urls_url' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profiles_urls_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesUrls';
  }

  public function getFields()
  {
    return array(
      'profiles_urls_id'  => 'Number',
      'profiles_id'       => 'ForeignKey',
      'profiles_urls_url' => 'Text',
    );
  }
}
