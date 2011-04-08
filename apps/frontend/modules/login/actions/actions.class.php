<?php

/**
 * login actions.
 *
 * @package    smashintracks
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {

     $this->form = new LoginPageForm();

     if ($request->isMethod('post') && $request->hasParameter('login_page'))
     {
       $this->form->bind($request->getParameter('login_page'));

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
