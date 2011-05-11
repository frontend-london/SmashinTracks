<?
class rememberFilter extends sfFilter
{
  public function execute ($filterChain)
  {
    // execute this filter only once
    if ($this->isFirstCall())
    {
      $rememeber_me = $this->getContext()->getRequest()->getCookie('remember_me');

      if (!empty($rememeber_me) && ProfilesPeer::isCookiePassCorrect($rememeber_me)) {
        Smashin::signIn(ProfilesPeer::getProfileByCookiePass($rememeber_me, false), true, $rememeber_me);
      } elseif(sfContext::getInstance()->getUser()->hasAttribute('profile_id')) {
        Smashin::signIn(ProfilesPeer::getProfileById(sfContext::getInstance()->getUser()->getAttribute('profile_id')));
      }
    }
    // execute next filter
    $filterChain->execute();
  }
}