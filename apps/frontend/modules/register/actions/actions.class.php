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

  private function sendConfirmEmail(Profiles $profile) {

      if(sfConfig::get('app_send_mail')) {
      
        $mail = $profile->getProfilesEmail();
        $mail_name = $profile->getProfilesName();

        $params = array('profile' => $profile, 'from' => array(sfConfig::get('app_contact_form_mail_from') => 'Smashintracks.com'), 'to' => array($mail => $mail_name), 'subject' => 'Confirm registration to SmashinTracks.com');

        $message = $this->getMailer()->compose();
        $message->setSubject($params['subject']);
        $message->setTo($params['to']);
        $message->setFrom($params['from']);

        $html = $this->getPartial('register/confirmMessageHtml',$params);
        $message->setBody($html, 'text/html');
        $text = $this->getPartial('register/confirmMessageTxt',$params);
        $message->addPart($text, 'text/plain');

        $this->getMailer()->send($message);

        $this->logMessage('Email send', 'info');
      } else {
        $this->logMessage('Email not send', 'alert');
      }
  }
  
  private function sendWelcomeEmail(Profiles $profile) {
      
      if(sfConfig::get('app_send_mail')) {
      
        $mail = $profile->getProfilesEmail();
        $mail_name = $profile->getProfilesName();

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

    if ($request->isMethod('post') && $request->hasParameter('profiles'))
    {
       $this->form->bind($request->getParameter('profiles'));
       if ($this->form->isValid())
       {
            $profile = $this->form->save();
            /*@var $profile Profiles */
            $register_url = Smashin::generate_random_pass(32);
            $profile->setProfilesRegisterUrl($register_url);
            $profile->setProfilesName(ucwords($profile->getProfilesName()));
            $profile->save();          
            $this->sendConfirmEmail($profile);          
            $this->redirect('register_welcome');
       }
    }

  }

  public function executeWelcome(sfWebRequest $request) {
      
  }
  
  public function executeConfirm(sfWebRequest $request) {
    $profile = $this->getRoute()->getObject();
    /* @var $profile Profiles */
    
    if($profile->getProfilesRegisterUrl()!=null) {
        $profile->setProfilesBlocked(false);
        $profile->setProfilesRegisterUrl(null);
        $profile->save();
        $this->sendWelcomeEmail($profile);
        Smashin::signIn($profile, false);   
    }
    $this->redirect('homepage');
  }
}
