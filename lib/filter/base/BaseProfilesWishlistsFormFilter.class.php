<?php

/**
 * ProfilesWishlists filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseProfilesWishlistsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_id'             => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'tracks_id'               => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => true)),
      'profiles_wishlists_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'profiles_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_id'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tracks', 'column' => 'tracks_id')),
      'profiles_wishlists_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('profiles_wishlists_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesWishlists';
  }

  public function getFields()
  {
    return array(
      'profiles_wishlists_id'   => 'Number',
      'profiles_id'             => 'ForeignKey',
      'tracks_id'               => 'ForeignKey',
      'profiles_wishlists_date' => 'Date',
    );
  }
}
