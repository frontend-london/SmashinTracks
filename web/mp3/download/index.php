<?php

    $DB_Server = "localhost"; //your MySQL Server
    $DB_Username = "modul_smashin"; //your MySQL User Name
    $DB_Password = "19aY2w2cuKWknxvSfV"; //your MySQL Password
    $DB_DBName = "modul_smashin"; //your MySQL Database Name

    define('TRACK_NEW_PERIOD', 1); // czas na ściągnięcie w dniach
    define('ADMIN_ACCESS_PASS', '13Ucgn7o0P7X12EJQuP5TFPf2JXxAtEXfovU'); // czas na ściągnięcie w dniach
/*
    $DB_Server = "localhost"; //your MySQL Server
    $DB_Username = "root"; //your MySQL User Name
    $DB_Password = ""; //your MySQL Password
    $DB_DBName = "stracks"; //your MySQL Database Name
*/

    function return_bytes($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        switch($last) {
            // The 'G' modifier is available since PHP 5.1.0
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }

        return $val;
    }

    function checkDb($transactions_tracks_id, $transactions_tracks_path) {
        $sql = "select * from transactions_tracks where transactions_tracks_id = '$transactions_tracks_id' and transactions_tracks_path = '$transactions_tracks_path' limit 1";
        $result = mysql_query($sql);
        $w = mysql_fetch_array($result);
        if(!$w) die('Error: Download link is broken.');
        $transactions_id = $w['transactions_id'];
        $sql2 = "select UNIX_TIMESTAMP(transactions_date) transactions_date from transactions where transactions_id = '$transactions_id'";
        $result2 = mysql_query($sql2);
        $w2 = mysql_fetch_array($result2);
        if(!$w2) die('Error '.__LINE__);
        $due_date = $w2['transactions_date']  + (TRACK_NEW_PERIOD * 24 * 60 * 60); // date + 24h
        $curr_date = time();
        if($due_date<$curr_date) die('Error: File expired.');
        $sql3 = "select COUNT(*) ilosc from transactions_tracks_downloads where transactions_tracks_id = '$transactions_tracks_id'";
        $result3 = mysql_query($sql3);
        $w3 = mysql_fetch_array($result3);
        if(!$w3) die('Error '.__LINE__);
        $ilosc = $w3['ilosc'];
        if($ilosc>=3) die('Error: File already downloaded 3 times.');
        return true;
    }

    function updateDb($transactions_tracks_id) {
        $sql4 = "INSERT INTO `transactions_tracks_downloads` (`transactions_tracks_downloads_id`, `transactions_tracks_id`, `transactions_tracks_downloads_date`) VALUES (NULL, '$transactions_tracks_id', NOW())";
        $result4 = mysql_query($sql4);
    }

    function getFilename($transactions_tracks_id) {
        $sql = "select t.tracks_path from tracks t, transactions_tracks tt where tt.transactions_tracks_id = '$transactions_tracks_id' and tt.tracks_id = t.tracks_id limit 1";
        $result = mysql_query($sql);
        $w = mysql_fetch_array($result);
        return $w['tracks_path'];
    }

    function getFilenameAdmin($tracks_id) {
        $sql = "select t.tracks_path from tracks t where t.tracks_id = '$tracks_id' limit 1";
        $result = mysql_query($sql);
        $w = mysql_fetch_array($result);
        return $w['tracks_path'];
    }

    /* DB CONNECTION */
    $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password);
    $Db = @mysql_select_db($DB_DBName, $Connect);

    /* ADMIN ACCESS */
    $admin = $_GET['admin'];
    $pass = $_GET['pass'];
    if($admin==1 && $pass == ADMIN_ACCESS_PASS) {
        $tracks_id = $_GET['id'];
        $is_admin = true;
    } else $is_admin = false;


    /* CHECK DB */
    if($is_admin) {
        $trackname = getFilenameAdmin($tracks_id).'.mp3';
    } else {
        $directory = substr($_SERVER["SCRIPT_NAME"], 0, -strlen('index.php'));
        $path = explode('/',$directory);
        unset($path[sizeof($path)-1]);
        $dirname = implode('/', $path);
        $url = trim(substr($_SERVER["REQUEST_URI"], strlen($directory)), '/');
        $first_url = substr($url, 0, strpos($url, '/'));
        $second_url = substr(strstr($url, '/'), 1);
        $transactions_tracks_id = (int)$first_url;
        $transactions_tracks_path = $second_url;
        if(urlencode($transactions_tracks_path)!=$transactions_tracks_path) die('Error '.__LINE__);
        checkDb($transactions_tracks_id, $transactions_tracks_path);
        $trackname = getFilename($transactions_tracks_id).'.mp3';
    }

    /* GENERATE & OUTPUT FILE */
    $realpath = '../../../music/'.$trackname; //$realpath = '../'.$trackname; - demo
    
    if(!file_exists($realpath)) die('Error: File not found.');
    $filename = $trackname;
    $mtime = ($mtime = filemtime($realpath)) ? $mtime : gmtime();
    $size = intval(sprintf("%u", filesize($realpath)));
    // Maybe the problem is we are running into PHPs own memory limit, so:
    if (intval($size + 1) > return_bytes(ini_get('memory_limit')) && intval($size * 1.5) <= 1073741824) { //Not higher than 1GB
      ini_set('memory_limit', intval($size * 1.5));
    }
    // Maybe the problem is Apache is trying to compress the output, so:
    //@apache_setenv('no-gzip', 1);
    ini_set('zlib.output_compression', 0);
    // Maybe the client doesn't know what to do with the output so send a bunch of these headers:
    header("Content-type: application/force-download");
    header('Content-Type: application/octet-stream');
    if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE") != false) {
      header("Content-Disposition: attachment; filename=" . urlencode($filename) . '; modification-date="' . date('r', $mtime) . '";');
    } else {
      header("Content-Disposition: attachment; filename=\"" . $filename . '"; modification-date="' . date('r', $mtime) . '";');
    }
    // Set the length so the browser can set the download timers
    header("Content-Length: " . $size);
    // If it's a large file we don't want the script to timeout, so:
    set_time_limit(18000); // 18000 sekund = 5 godzin
    // If it's a large file, readfile might not be able to do it in one go, so:
    $chunksize = 1 * (1024 * 1024); // how many bytes per chunk
    if ($size > $chunksize) {
      $handle = fopen($realpath, 'rb');
      $buffer = '';
      while (!feof($handle)) {
        $buffer = fread($handle, $chunksize);
        echo $buffer;
        ob_flush();
        flush();
      }
      fclose($handle);
    } else {
      readfile($realpath);
    }

    if(!$is_admin) {
        /* UPDATE DB */
        updateDb($transactions_tracks_id);
    }
    // Exit successfully. We could just let the script exit
    // normally at the bottom of the page, but then blank lines
    // after the close of the script code would potentially cause
    // problems after the file download.
    exit;
?>