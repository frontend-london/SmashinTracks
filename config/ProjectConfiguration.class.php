<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropelPlugin');

    $this->enablePlugins('sfThumbnailPlugin');

    sfConfig::set('sf_upload_dir', sfConfig::get('sf_root_dir').DIRECTORY_SEPARATOR.'uploads');
    sfConfig::set('sf_upload_profiles_dir', sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'profiles');
    sfConfig::set('sf_images_profiles_dir', sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'profiles');
    sfConfig::set('sf_images_profiles_big_dir', sfConfig::get('sf_images_profiles_dir').DIRECTORY_SEPARATOR.'big');
    sfConfig::set('sf_images_profiles_small_dir', sfConfig::get('sf_images_profiles_dir').DIRECTORY_SEPARATOR.'small');
  }
}
