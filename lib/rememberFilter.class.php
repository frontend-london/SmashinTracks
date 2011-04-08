<?
class rememberFilter extends sfFilter
{
  public function execute ($filterChain)
  {
    // execute this filter only once
    if ($this->isFirstCall())
    {
      $user_id = (int)$this->getContext()->getRequest()->getCookie('user_id');
      $rememeber_me = $this->getContext()->getRequest()->getCookie('remember_me');

      $this->getContext()->getResponse()->setCookie('debug_user_id', $user_id);
      $this->getContext()->getResponse()->setCookie('debug_remeber_me', $rememeber_me);


      if ($user_id && $rememeber_me && ProfilesPeer::isCookiePassCorrect($user_id, $rememeber_me)) {
        Smashin::signIn(ProfilesPeer::getProfileById($user_id), true, $rememeber_me);
        $this->getContext()->getResponse()->setCookie('debug_correct', 1);
      } else {
          $this->getContext()->getResponse()->setCookie('debug_correct', 0);
      }
    }
    // execute next filter
    $filterChain->execute();
  }
}