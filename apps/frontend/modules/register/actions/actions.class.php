<?php

/**
 * register actions.
 *
 * @package    smashintracks
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeShow(sfWebRequest $request)
  {
    $this->form = new ProfilesForm();

    

    if ($request->isMethod('post'))
    {
       $this->form->bind($request->getParameter('profiles'));
       if ($this->form->isValid())
       {
          //$this->form->save($request->getParameter('profiles'));
          $this->form->save(); // zaktualizuj save / doSave w modelu
          $this->redirect('register_welcome');
       }
    }

  }

  public function executeWelcome(sfWebRequest $request) {
      
  }
}
