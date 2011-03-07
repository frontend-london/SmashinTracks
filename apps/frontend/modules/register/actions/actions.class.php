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

      if(sfConfig::get('sf_environment')!='dev') {
      
        $mail = $this->form->getValue('profiles_email');
        $mail_name = $this->form->getValue('profiles_name');

        $params = array('from' => array(sfConfig::get('app_contact_form_mail_from') => 'Smashintracks.com'), 'to' => array($mail => $mail_name), 'subject' => 'Welcome to SmashinTracks.com');

        $message = $this->getMailer()->compose();
        $message->setSubject($params['subject']);
        $message->setTo($params['to']);
        $message->setFrom($params['from']);

        $html = $this->getPartial('register/welcomeMessageHtml',$params);
        $message->setBody($html, 'text/html');
        $text = $this->getPartial('register/welcomeMessageTxt',$params);
        $message->addPart($text, 'text/plain');

        $this->getMailer()->send($message);

        $this->logMessage('Email send', 'info');
      } else {
        $this->logMessage('Email not send', 'alert');
      }
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

          $profile = $this->form->save();
          
          $oUser = $this->getUser();
          $oUser->setAttribute('profile_id',$profile->getProfilesId());
          $oUser->setAttribute('is_user',true);
          
          $this->redirect('register_welcome');
       }
    }

  }

  public function executeWelcome(sfWebRequest $request) {
      
  }
}
