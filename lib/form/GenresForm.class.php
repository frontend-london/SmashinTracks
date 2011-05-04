<?php

/**
 * Genres form.
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
class GenresForm extends BaseGenresForm
{

  public function setup()
  {
    parent::setup();
    sfValidatorBase::setDefaultMessage('required', 'Wartość nie może być pusta.');
    sfValidatorBase::setDefaultMessage('invalid', 'Nieprawidowa wartość.');
    $this->useFields(array('genres_id', 'genres_name'));
  }

  public function configure()
  {
    $this->setWidgets(array(
      'genres_id'                    => new sfWidgetFormInputHidden(),
      'genres_name'                  => new sfWidgetFormInputText(),
      'genres_photo'                 => new sfWidgetFormInputFile(),
    ));

    $this->widgetSchema->setNameFormat('genres[%s]');

    $field = 'Nazwa';
    $field_name = 'genres_name';
    $this->getValidator($field_name)->addOption('min_length',3);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field jest za krótka (min %min_length% znaków).");
    $this->getValidator($field_name)->setMessage('max_length',"$field jest za długa (max %max_length% znaków).");
    $this->getValidator($field_name)->setMessage('required',"$field nie może być pusta."); // addMessage
    $this->getValidator($field_name)->setMessage('invalid',"$field jest nieprawidłowa.");

    $field = 'Nagłówek';
    $field_name = 'genres_photo';
    $this->validatorSchema[$field_name] = new sfValidatorFile(array(
                                            'max_size' => 102400,
                                            'mime_types' => 'web_images',
                                            'required' => false,
                                          ));

    $post_validators = $this->validatorSchema->getPostValidator()->getValidators();
    foreach($post_validators as $post_validator) {
        if(get_class($post_validator)=='sfValidatorPropelUnique') {
            $columns = $post_validator->getOption('column');
            if($columns[0]=='genres_name') {
                $post_validator->setMessage('invalid', 'Nazwa gatunku w użyciu.');
            }
        }
    }

  }
}
