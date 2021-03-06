<?php

class Smashin
{
  
    public static function getMaxId($column, $table){
        $con = Propel::getConnection();
        $query = 'SELECT MAX(%s) AS max FROM %s';
        $query = sprintf($query,$column, $table);
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['max'];
    }

    public static function dateDiff($iniDate, $endDate) {
       $iniDate = explode("-",$iniDate);
       $endDate = explode("-",$endDate);
       $start_date  =       gregoriantojd($iniDate[1], $iniDate[2], $iniDate[0]);
       $end_date    =       gregoriantojd($endDate[1], $endDate[2], $endDate[0]);
       $dif = $end_date - $start_date;
       return $dif;
    }

    public static function generate_url_for($route_name, $route_object = null) {
        if($route_object) return url_for($route_name, $route_object); else return url_for($route_name);
    }

    public static function generate_prize($prize) {
        return sfConfig::get('app_default_prize_currency').number_format($prize, 2);
    }

    public static function generate_default_prize_int() {
        return intval(sfConfig::get('app_default_prize')*100);
    }

    public static function generateMonthInPolish($m) {
        $m = (int)$m;
        $months = array(null, 'styczeń', 'luty', 'marzec', 'kwiecień', 'maj', 'czerwiec', 'lipiec', 'sierpień', 'wrzesień', 'październik', 'listopad', 'grudzień');
        return $months[$m];
    }

    public static function generateWeekdayInPolish($d) {
        $d = (int)$d;
        $weekday = array(null, 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota', 'niedziela');
        return $weekday[$d];
    }

    public static function generateDateInPolish(DateTime $dt) {
        $format = 'Y-m-d';

        $day = $dt->format('j');
        $year = $dt->format('Y');
        $month = self::generateMonthInPolish($dt->format('m'));
        $weekday = self::generateWeekdayInPolish($dt->format('N'));

        return "$day $month $year, $weekday"; // np. 2 stycznia 2010, wtorek
    }

    /*
     * Zamienia wszyskie litery specjalne na ich odpowiedniki w ASCII np. ą na a itd.
     */
    public static function clearUTF($s)
    {
        $r = '';
        $s1 = @iconv('UTF-8', 'ASCII//TRANSLIT', $s);
        $j = 0;
        for ($i = 0; $i < strlen($s1); $i++) {
            $ch1 = $s1[$i];
            $ch2 = @mb_substr($s, $j++, 1, 'UTF-8');
            if (strstr('`^~\'"', $ch1) !== false) {
                if ($ch1 <> $ch2) {
                    --$j;
                    continue;
                }
            }
            $r .= ($ch1=='?') ? $ch2 : $ch1;
        }
        return $r;
    }

    public static function capitalizeWords($words, $charList = null) {
        // Use ucwords if no delimiters are given
        if (!isset($charList)) {
         return ucwords($words);
        }

        // Go through all characters
        $capitalizeNext = true;

        for ($i = 0, $max = strlen($words); $i < $max; $i++) {
         if (strpos($charList, $words[$i]) !== false) {
             $capitalizeNext = true;
         } else if ($capitalizeNext) {
             $capitalizeNext = false;
             $words[$i] = strtoupper($words[$i]);
         }
        }

        return $words;
    }

    /*
     * Zamienia wszystkie znaki spoza podstawowych a-z 0-9 A-Z na podstawowe
     * Przykład
     * ciąg: aącćDóu !@#$%^%&* test
     * na:   aaccdou-test
     */
    public static function generate_url($string, $size=0)
    {
        $string = strtr($string, array('&amp;' => '-'));
        $string = self::clearUTF($string);
        $string_cp = $string;
        $string = '';

        for($i=0;$i<strlen($string_cp);$i++) {
            $char = ord($string_cp[$i]);
            if((in_array($char, range(48, 57)) || in_array($char, range(65, 90)) || in_array($char, range(97, 122)))) $string.=$string_cp[$i]; else $string.=' ';
        }
        $string = trim($string);
        $string = strtr($string, array(' ' => '-'));
        while(strpos($string,'--')) {
            $string = strtr($string, array('--' => '-'));
        }
        $string = strtolower($string); // tylko male litery
        if($size>0) $string = substr($string, 0, $size);
        return $string;
    }

    /** 
     * Szyfruje hasło sha256 - char(64)
     * @param <string> $pass
     * @return <string> wygenerowane hasło
     */
    public static function generateHash($pass) {
        return hash('sha256',$pass); // sha256 = char(64)
    }

    public static function generateRememberMePass($pass) {
      $user_browser = $_SERVER['HTTP_USER_AGENT'];
      $hash = sfConfig::get('app_remember_me_hash');
      $user_cookie_array = array($user_browser, $pass, $hash);
      return hash('sha256',serialize($user_cookie_array));
    }

    public static function generateRememberMeValue($id, $pass) {
        return base64_encode(serialize(array($id, self::generateRememberMePass($pass))));
    }

    public static function signOut() {
      sfContext::getInstance()->getUser()->getAttributeHolder()->remove('profile_id');
      sfContext::getInstance()->getUser()->getAttributeHolder()->remove('basket');
      sfContext::getInstance()->getUser()->getAttributeHolder()->remove('transaction_id');
      sfContext::getInstance()->getUser()->setAuthenticated(false);
      sfContext::getInstance()->getUser()->removeCredential('user');
      sfContext::getInstance()->getResponse()->setCookie('remember_me', null, time(), '/');
    }

    public static function signIn($profile, $remember_me = false, $cookie_hash = null) {
        if(is_object($profile) && $profile->isActive()) {
            sfContext::getInstance()->getUser()->setAuthenticated(true);
            sfContext::getInstance()->getUser()->setAttribute('profile_id',$profile->getProfilesId());
            sfContext::getInstance()->getUser()->addCredential('user');
            if($profile->isAdmin()) {
                sfContext::getInstance()->getUser()->addCredential('admin');
            }
            if($remember_me) {
              if(!isset($cookie_hash)) $cookie_hash = self::generateRememberMeValue($profile->getProfilesId(), $profile->getProfilesPassword());
              sfContext::getInstance()->getResponse()->setCookie('remember_me', $cookie_hash, time()+60*60*24*sfConfig::get('app_remember_me_period'), '/');
            }
        }
    }

    public static function generate_random_pass($length) {
        $haslo = ''.rand(0,9);
        $length--;
        for($i=1;$i<=$length;$i++) {
            $a = rand(0,61);
            if($a<=9) $symbol = $a;
            else{
                $a = $a - 10;
                if($a<=25) $symbol = chr(65+$a);
                else {
                    $a = $a - 26;
                    $symbol = chr(97+$a);
                }
            }
            $haslo = $haslo.$symbol;
        }
        return $haslo;
    }

    public static function PHP_slashes($string,$type='add')
     {
         if ($type == 'add')
         {
             if (get_magic_quotes_gpc())
             {
                 return $string;
             }
             else
             {
                 if (function_exists('addslashes'))
                 {
                     return addslashes($string);
                 }
                 else
                 {
                     return mysql_real_escape_string($string);
                 }
             }
         }
         else if ($type == 'strip')
         {
             return stripslashes($string);
         }
         else
         {
             die('error in PHP_slashes (mixed,add | strip)');
         }
     }

     public static function generate_injected_text($text, $translation) {
         return strtr($text, $translation);
     }
     
     public static function is_in_alphabet($letter) {
        $letters = range('A','Z');
        $nums = array('0','1','2','3','4','5','6','7','8','9');
        $alphabet = array_merge($letters, $nums);
        return in_array($letter, $alphabet, true);
     }

     public static function facebook_publish_url($link, $source) {
            $app_id = "227810547292287";
            $app_secret = "8e85f978744deb9d17b9a52d5afce4f9";
            $access_token = 'AAADPMUaZCWH8BAKTtGjEUGfJLcZBMgPJFneYuZBsNAPHv6pumLT3d7h9peyXZB5lIEp0IeHIFizoe1ZBsTrrT6ZCPkRxkYR4X0ZAan6WWsbj7NC2RqYFD7X';
            $profile_id = '214164275274674';
            $params = array(
             'appId' => $app_id,
             'secret' => $app_secret,
             'cookie' => true
            );

            $facebook = new Facebook($params);
            $facebook->setAccessToken($access_token);

            $status = $facebook->api('/'.$profile_id.'/feed', 'POST', array(
                'link' => $link,
                'source' => $source
//                'message    ' => $url
            ));

            return 1;

    }
}
?>
