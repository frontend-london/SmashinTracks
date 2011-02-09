<?php

/**
 * ProfilesWishlists form base class.
 *
 * @method ProfilesWishlists getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProfilesWishlistsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_wishlists_id' => new sfWidgetFormInputHidden(),
      'profiles_id'           => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => false)),
      'tracks_id'             => new sfWidgetFormPropelChoice(array('model' => 'Tracks', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'profiles_wishlists_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getProfilesWishlistsId()), 'empty_value' => $this->getObject()->getProfilesWishlistsId(), 'required' => false)),
      'profiles_id'           => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_id'             => new sfValidatorPropelChoice(array('model' => 'Tracks', 'column' => 'tracks_id')),
    ));

    $this->widgetSchema->setNameFormat('profiles_wishlists[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesWishlists';
  }


}
