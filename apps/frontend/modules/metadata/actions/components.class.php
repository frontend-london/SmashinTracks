<?php   
  class metadataComponents extends sfComponents   
  {   
    
    public function executeMenuleft(sfWebRequest $request)   
    {   
      $this->menuleft = GenresPeer::doSelect(new Criteria());
      $this->genre_path = $this->getRequestParameter('genres_path');
    }       
}  