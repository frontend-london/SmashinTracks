<?php

/**
 * ProfilesUrls form base class.
 *
 * @method ProfilesUrls getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseProfilesUrlsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'profiles_urls_id'  => new sfWidgetFormInputHidden(),
      'profiles_id'       => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => false)),
      'profiles_urls_url' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'profiles_urls_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getProfilesUrlsId()), 'empty_value' => $this->getObject()->getProfilesUrlsId(), 'required' => false)),
      'profiles_id'       => new sfValidatorPropelChoice(array('model' => 'Profiles', 'column' => 'profiles_id')),
      'profiles_urls_url' => new sfValidatorString(array('max_length' => 200)),
    ));

    $this->widgetSchema->setNameFormat('profiles_urls[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfilesUrls';
  }


}
