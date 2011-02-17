<?php

/**
 * contact actions.
 *
 * @package    smashintracks
 * @subpackage contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }





  public function executeThankyou()
  {
  }
  
  public function executeShow(sfWebRequest $request)
  {
      $this->form = new ContactForm();

     if ($request->isMethod('post'))
     {
       $this->form->bind($request->getParameter('contact'));
       if ($this->form->isValid())
       {
        // send an email
        $message = $this->getMailer()->compose(
            array(sfConfig::get('app_contact_form_mail_from') => 'Smashintracks.com'),
            sfConfig::get('app_contact_form_mail_to'),
            'Wiadomość od użytkownika',
            'Wiadomość od użytkownika '.$this->form->getValue('name').":\n\n".'Email: '.$this->form->getValue('email')."\n\nTemat: ".$this->form->getValue('subject')."\n\nTreść: ".$this->form->getValue('content'));

        $this->getMailer()->send($message);
        $this->redirect('contact/thankyou?'.http_build_query($this->form->getValues()));
       }
     } 
  }
}
