<?php

/**
 * Tracks form.
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
class TracksForm extends BaseTracksForm
{

  public function setup()
  {
    parent::setup();
    sfValidatorBase::setDefaultMessage('required', 'This value is required.');
    sfValidatorBase::setDefaultMessage('invalid', 'This value is invalid.');
    $this->useFields(array('tracks_title', 'tracks_artist'));
  }

  public function configure()
  {

    $this->setWidgets(array(
      'tracks_title'          => new sfWidgetFormInputText(),
      'tracks_artist'         => new sfWidgetFormInputText(),
      'tracks_preview'        => new sfWidgetFormInputFile(),
      'full_track'            => new sfWidgetFormInputFile(),
      'tracks_time_regex'     => new sfWidgetFormInputText(),
      'genre_1'               => new sfWidgetFormSelect(array('choices' => array_combine(array_merge(array(''), GenresPeer::getGenresNames()), array_merge(array('-- wybierz gatunek --'), GenresPeer::getGenresNames())))),
      'genre_2'               => new sfWidgetFormSelect(array('choices' => array_combine(array_merge(array(''), GenresPeer::getGenresNames()), array_merge(array('-- wybierz gatunek --'), GenresPeer::getGenresNames())))),
      'genre_3'               => new sfWidgetFormSelect(array('choices' => array_combine(array_merge(array(''), GenresPeer::getGenresNames()), array_merge(array('-- wybierz gatunek --'), GenresPeer::getGenresNames())))),
      'terms'                 => new sfWidgetFormInputCheckbox(),
    ));

    $this->widgetSchema->setNameFormat('tracks[%s]');

    $field = 'Track title';
    $field_name = 'tracks_title';
    $this->getValidator($field_name)->addOption('min_length',5);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field is too short (min %min_length% characters).");
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty.");
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");

    $field = 'Alias';
    $field_name = 'tracks_artist';
    $this->getValidator($field_name)->addOption('min_length',5);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field is too short (min %min_length% characters).");
    $this->getValidator($field_name)->setMessage('max_length',"$field is too long (max %max_length% characters).");
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty.");
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");
    $this->setDefault($field_name, ProfilesPeer::getCurrentProfile()->getProfilesName());

    $field = 'Track preview';
    $field_name = 'tracks_preview';
    $this->validatorSchema[$field_name] = new sfValidatorFile(array(
                                              'max_size' => 10485760, // 10 MB
                                              'mime_types' => array('audio/mpeg'),
                                              'required' => true,
                                          ), array('required' => "$field can not be empty."));

    $field = 'Full track';
    $field_name = 'full_track';
    $this->validatorSchema[$field_name] = new sfValidatorFile(array(
                                              'max_size' => 104857600, // 100 MB
                                              'mime_types' => array('audio/mpeg'),
                                              'required' => true,
                                          ), array('required' => "$field can not be empty."));

    $field = 'Time';
    $field_name = 'tracks_time_regex';
    $this->validatorSchema[$field_name] = new sfValidatorRegex(array('pattern' => '/^([0-9]?[0-9]?[0-9]):([0-5][0-9])$/'));
    $this->getValidator($field_name)->setMessage('required',"$field can not be empty.");
    $this->getValidator($field_name)->setMessage('invalid',"$field is invalid.");


    $field = 'Genre 1';
    $field_name = 'genre_1';
    $this->validatorSchema[$field_name] = new sfValidatorPropelChoice(array('model' => GenresPeer::TABLE_NAME, 'criteria' => new Criteria(), 'column' => 'genres_name'), array('required' => "$field can not be empty.", 'invalid' => "$field is invalid."));
    
    $field = 'Genre 2';
    $field_name = 'genre_2';
    $this->validatorSchema[$field_name] = new sfValidatorPropelChoice(array('model' => GenresPeer::TABLE_NAME, 'criteria' => new Criteria(), 'column' => 'genres_name', 'required' => false), array('required' => "$field can not be empty.", 'invalid' => "$field is invalid."));

    $field = 'Genre 3';
    $field_name = 'genre_3';
    $this->validatorSchema[$field_name] = new sfValidatorPropelChoice(array('model' => GenresPeer::TABLE_NAME, 'criteria' => new Criteria(), 'column' => 'genres_name', 'required' => false), array('required' => "$field can not be empty.", 'invalid' => "$field is invalid."));

    $field = 'Terms';
    $field_name = 'terms';
    $this->validatorSchema[$field_name] = new sfValidatorBoolean(array('required' => true), array('invalid' => 'Please read and accept the terms first.', 'required' => 'Please read and accept the terms first.'));


    $this->validatorSchema->setPostValidator(
        new sfValidatorAnd(array(
            $this->validatorSchema->getPostValidator(),
            new sfValidatorSchemaCompare('genre_2', sfValidatorSchemaCompare::NOT_EQUAL, 'genre_1',
                array('throw_global_error' => false),
                array('invalid' => 'Genres must be diffrent.')
            ),
            new sfValidatorSchemaCompare('genre_3', sfValidatorSchemaCompare::NOT_EQUAL, 'genre_1',
                array('throw_global_error' => false),
                array('invalid' => 'Genres must be diffrent.')
            ),
            new sfValidatorOr(array( // muszą być różne chyba że oba są puste
                new sfValidatorSchemaCompare('genre_3', sfValidatorSchemaCompare::EQUAL, '',
                    array('throw_global_error' => false)
                ),
                new sfValidatorSchemaCompare('genre_3', sfValidatorSchemaCompare::NOT_EQUAL, 'genre_2',
                    array('throw_global_error' => false),
                    array('invalid' => 'Genres must be diffrent.')
                )
            )),


        ))
    );

  }
}
