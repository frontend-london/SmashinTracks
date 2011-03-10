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
      $this->profile = ProfilesPeer::getCurrentProfile();
    }

    public function executeLoginbox(sfWebRequest $request)
    {
     $this->form = new LoginForm();

     if ($request->isMethod('post'))
     {
       $this->form->bind($request->getParameter('login'));
       
       if ($this->form->isValid())
       {
           $profile = ProfilesPeer::getProfileIfLoginCorrect($this->form->getValue('email'), $this->form->getValue('password'));
           Smashin::signIn($profile);
           $this->getContext()->getActionStack()->getLastEntry()->getActionInstance()->redirect('homepage');
       }
     }
  }
}  