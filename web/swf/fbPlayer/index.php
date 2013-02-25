<?php

    header ("content-type: text/xml");
  
    $DB_Server = "localhost"; //your MySQL Server
    $DB_Username = "martino_stracks"; //your MySQL User Name
    $DB_Password = "tiPrbOUl"; //your MySQL Password
    $DB_DBName = "martino_stracks"; //your MySQL Database Name
    
    
//    $DB_Server = "localhost"; //your MySQL Server
//    $DB_Username = "root"; //your MySQL User Name
//    $DB_Password = ""; //your MySQL Password
//    $DB_DBName = "stracks"; //your MySQL Database Name
    
    //create MySQL connection
    $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password);
    
    //select database
    $Db = @mysql_select_db($DB_DBName, $Connect);
    
    $url = $_SERVER["REQUEST_URI"];
    
    $directory = substr($_SERVER["SCRIPT_NAME"], 0, -strlen('index.php'));
    
    $id = (int)trim(substr($_SERVER["REQUEST_URI"], strlen($directory)), '/');
    
    $sql = "SELECT *  FROM `tracks` WHERE `tracks_id` = '$id' AND `tracks_deleted` = '0'";
    $result = mysql_query($sql);
    if(!$w = mysql_fetch_array($result)) exit();

?><config>
	<artist><![CDATA[<?php echo $w['tracks_artist']?>]]></artist>
	<title><![CDATA[<?php echo $w['tracks_title']?>]]></title>
	<src><![CDATA[http://smashintracks.com/mp3/<?php echo $w['tracks_path']?>.mp3]]></src>
	<link><![CDATA[http://smashintracks.com/track/<?php echo $w['tracks_path']?>]]></link>
	<price><![CDATA[$1.40]]></price>
</config>