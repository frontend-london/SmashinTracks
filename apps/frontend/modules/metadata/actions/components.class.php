<?php   
  class metadataComponents extends sfComponents   
  {   
    
    public function executeMenuleft(sfWebRequest $request)   
    {   
      $this->menuleft = GenresPeer::doSelect(new Criteria());
      $this->genre_path = $this->getRequestParameter('genres_path');
    }

    public function executeSubmenu(sfWebRequest $request)
    {
      $oUser = $this->getUser();
      if($oUser->hasAttribute('profile_id')) {
          $profile_id = $oUser->getAttribute('profile_id');
          $this->profile = ProfilesPeer::getProfilesById($profile_id);
      }
    }
}  