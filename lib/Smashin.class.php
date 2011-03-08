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

    public static function signOut() {
      sfContext::getInstance()->getAttributeHolder()->remove('profile_id');
      sfContext::getInstance()->getUser()->setAuthenticated(false);
      sfContext::getInstance()->getUser()->removeCredential('user');      
    }

    public static function signIn($profile) {
      sfContext::getInstance()->getUser()->setAuthenticated(true);
      sfContext::getInstance()->getUser()->setAttribute('profile_id',$profile->getProfilesId());
      sfContext::getInstance()->getUser()->addCredential('user');
    }
}
?>
