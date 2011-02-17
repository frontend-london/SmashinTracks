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
}
?>
