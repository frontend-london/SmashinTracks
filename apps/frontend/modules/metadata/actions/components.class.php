<?php   
  class metadataComponents extends sfComponents   
  {   
    
    public function executeMenuleft(sfWebRequest $request)   
    {   
      $this->menuleft = GenresPeer::doSelect(new Criteria());
      $this->genre_path = $this->getRequestParameter('genres_path');
    }

    public function executeMainmenu(sfWebRequest $request)
    {
      $this->isAdmin = ProfilesPeer::isAdminProfile();
    }

    public function executeSubmenu(sfWebRequest $request)
    {
      $this->isProfile = ProfilesPeer::isCurrentProfile();
      $this->isAdmin = ProfilesPeer::isAdminProfile();
      $this->profile = ProfilesPeer::getCurrentProfile();
    }

    public function executeLoginbox(sfWebRequest $request)
    {
     $this->form = new LoginForm();

     if ($request->isMethod('post') && $request->hasParameter('login'))
     {
       $this->form->bind($request->getParameter('login'));
       
       if ($this->form->isValid())
       {
           $profile = ProfilesPeer::getProfileIfLoginCorrect($this->form->getValue('email'), $this->form->getValue('password'));
           $remember_me = $this->form->getValue('remember_me');
           Smashin::signIn($profile, $remember_me);
           $this->getContext()->getActionStack()->getLastEntry()->getActionInstance()->redirect('homepage');
       }
     }
  }
}  