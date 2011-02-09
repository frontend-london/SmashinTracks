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
}
?>
