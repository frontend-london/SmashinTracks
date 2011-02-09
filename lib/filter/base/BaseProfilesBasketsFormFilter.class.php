<?php

/**
 * ProfilesBaskets filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseProfilesBasketsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_id'         => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'tracks_id'           => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'profiles_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tracks', 'column' => 'tracks_id')),
    ));

    $this->widgetSchema->setNameFormat('profiles_baskets_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesBaskets';
  }

  public function getFields()
  {
    return array(
      'profiles_baskets_id' => 'Number',
      'profiles_id'         => 'ForeignKey',
      'tracks_id'           => 'ForeignKey',
    );
  }
}
