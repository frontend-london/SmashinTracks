<?php

    $notify_email =  "notify@smashintracks.com"; //email address to which debug emails are sent to
//    $DB_Server = "localhost"; //your MySQL Server
//    $DB_Username = "root"; //your MySQL User Name
//    $DB_Password = ""; //your MySQL Password
//    $DB_DBName = "stracks"; //your MySQL Database Name
    
    $DB_Server = "localhost"; //your MySQL Server
    $DB_Username = "martino_stracks"; //your MySQL User Name
    $DB_Password = "tiPrbOUl"; //your MySQL Password
    $DB_DBName = "martino_stracks"; //your MySQL Database Name

    

$godz = 3600;
$day = $godz * 24;
$week = $day *7;

$week_end = date('Y-m-d', time() - $day); // -day bo wysyla po polnocy
$week_start = date('Y-m-d', time() - $week);

//$week_end = '2011-12-20';
//$week_start = '2011-12-13';

    set_time_limit(600); // 600 sekund = 10 minut


    //create MySQL connection
    $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password);
    
    //select database
    $Db = @mysql_select_db($DB_DBName, $Connect);
    
    
    $artists = array();
    
    $sql = "SELECT *  FROM `transactions` WHERE `transactions_date` >= '$week_start' AND `transactions_date` <= '$week_end' AND `transactions_done` = '1'";
    $result = mysql_query($sql);
    while($w = mysql_fetch_array($result)) {
        $sql2 = "SELECT tt.transactions_tracks_id, t.tracks_title, t.tracks_artist, t.profiles_id FROM `transactions_tracks` tt, `tracks` t WHERE tt.`transactions_id` =  '{$w['transactions_id']}' AND tt.tracks_id = t.tracks_id ";
        $result2 = mysql_query($sql2);
        while($w2 = mysql_fetch_array($result2)) {
            $profiles_id = $w2['profiles_id'];
            $artists[$profiles_id][] = $w2['tracks_artist'].' - '.$w2['tracks_title'];
            
        }
    }
    
    if(empty($artists)) {
        echo 'NO RECORDS';
        exit();
    }        
    
    $artists_ids_array = array_keys ($artists);
    $artists_ids_text = implode(', ', $artists_ids_array);
    
    $sql3 = "SELECT `profiles_id`, `profiles_name`, `profiles_email` FROM `profiles` WHERE profiles_id IN ($artists_ids_text) AND profiles_sales_inform_weekly = 1"; 
    $result3 = mysql_query($sql3);
    while($w3 = mysql_fetch_array($result3)) {
        $profiles_id = $w3['profiles_id'];
        $profiles_name = $w3['profiles_name'];
        $profiles_email = $w3['profiles_email'];
        $content_text = "Hello $profiles_name,\nYou have sold following tracks last week:\n\n";
        $counter = 0;
        foreach($artists[$profiles_id] as $track) {
            $counter++;
            $content_text.= $counter.'. '.$track."\n";
        }
        
        $content_text.= "\nRegards,\n\n===================\n\n";
        
        $content_html = '<html>
        <head>
        <title>Your Tracks sold on Smashintracks.com last week:</title>
        </head>
        <body>';
        
        $content_html.= nl2br($content_text);
        $content_text.="SMASHINTRACKS.COM"; // wersja TXT nie jest wysylana
        $content_html.='<a href="http://smashintracks.com">SMASHINTRACKS.COM</a></body></html>';
        
        $subject = 'Your Tracks sold on Smashintracks.com last week';
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-2' . "\r\n";
        $headers .= 'From: SmashinTracks.com <office@smashintracks.com>' . "\r\n";
        
        $content_html_iso = iconv("UTF-8", "ISO-8859-2", $content_html);
        
        mail($profiles_email, $subject, $content_html_iso, $headers);
        mail($notify_email, $subject, $content_html_iso, $headers);        
        
        
    }
    
    echo 'OK';