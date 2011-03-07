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

  private function sendEmail() {
        $mail = $this->form->getValue('profiles_email');
        $mail_name = $this->form->getValue('profiles_name');
        
        $message = $this->getMailer()->compose();
        $message->setSubject('Welcome to SmashinTracks.com');
        $message->setFrom(array(sfConfig::get('app_contact_form_mail_from') => 'Smashintracks.com'));
        $message->setTo(array($mail => $mail_name));

        $html = $this->getPartial('register/welcomeMessageHtml',$params);
        $message->setBody($html, 'text/html');
        $text = $this->getPartial('register/welcomeMessageTxt',$params);
        $message->addPart($text, 'text/plain');

        $this->getMailer()->send($message);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->form = new ProfilesForm();

    if ($request->isMethod('post'))
    {
       $this->form->bind($request->getParameter('profiles'));
       if ($this->form->isValid())
       {

          $this->sendEmail();

          $this->form->save();
          $this->redirect('register_welcome');
       }
    }

  }

  public function executeWelcome(sfWebRequest $request) {
      
  }
}
