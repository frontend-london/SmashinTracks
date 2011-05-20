<?php

define('ADMIN_PROFILE', 1);
define('TRACK_PRIZE_HALF', 1); // 700
define('TRACK_PRIZE', 2); // 1400
define('SERVER_ADDRESS', 'http://smashintracks.com');

//DB connect creds and email
$notify_email =  "m.matuszewski@gmail.com"; //email address to which debug emails are sent to
$DB_Server = "localhost"; //your MySQL Server
$DB_Username = "martino_stracks"; //your MySQL User Name
$DB_Password = "tiPrbOUl"; //your MySQL Password
$DB_DBName = "martino_stracks"; //your MySQL Database Name

/*
 * CONTENT
 */

function generate_random_pass($length) {
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

function startLog() {
    global $invoice;
    global $txn_id;
    global $is_log;
    global $filename_log;
    if(!$is_log) {
        $filename_log = "logs/inv_$invoice.log";
        if($invoice==0) {
            $filename_log = "logs/paypal.log";
        }
        if(file_get_contents($filename_log)!==false) {
            addToLog(file_get_contents($filename_log)."\n");
        }
        addToLog("------------------------------------------------------------------------\n".date('d-m-Y h:i:s')." - INVOICE $invoice - TXNID - $txn_id");
        addToLog("POST: ".print_r($_POST, true));
        $is_log = true;
    }
}

function addToLog($message) {
    global $log;
    $log.=$message."\n";
}

function saveLog() {
    global $is_log;
    global $log;
    global $filename_log;
    if($is_log) {
        file_put_contents($filename_log, $log); // na końcu
    }
}

function dieLog($message) {
    addToLog($message);
    saveLog();
    die();
}

function mail_attachment_text($mailto, $from_mail, $from_name, $subject, $message, $attachment_name, $attachment_content) {
    $file_size = strlen($attachment);
    $content = chunk_split(base64_encode($attachment_content));
    $uid = md5(uniqid(time()));
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    //$header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-2\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: text/plain; name=\"".$attachment_name."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$attachment_name."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    $subject_iso = iconv("UTF-8", "ISO-8859-2", $subject);
    $header_iso = iconv("UTF-8", "ISO-8859-2", $header);
    mail($mailto, $subject_iso, "", $header_iso);
}

function mail_download_links($to, $num_cart_items, $track_name, $transactions_tracks_id, $transactions_tracks_path, $transactions_id, $transactions_path = null, $invoice) {
    $to  = 'modul008@gmail.com, '.$to;
    $subject = 'Your Tracks from Smashintracks.com';
    if(!empty($transactions_path)) $transactions_path = '/'.$transactions_path;
    $message = '<html>
    <head>
      <title>Your Tracks from Smashintracks.com:</title>
    </head>
    <body>
    ========================================================================<br />
    <<<  SMASHINTRACKS.COM  >>>   DO NOT REPLY   <<<  SMASHINTRACKS.COM  >>><br />
     ========================================================================<br />
    <br />
    Hello,<br />
    Thank you for purchasing tracks from SmashinTracks.com<br />
    <br />
    To download your purchases, please click the following url (or copy and paste into your browser):<br />
    <br />';
    for($i=1;$i<=$num_cart_items;$i++) {
        //$message.= $i.' <a href="'.SERVER_ADDRESS."/mp3/download/{$transactions_tracks_id[$i]}/{$transactions_tracks_path[$i]}\">{$track_name[$i]}</a><br />";
        $message.= "{$track_name[$i]}<br /><a href=\"".SERVER_ADDRESS."/mp3/download/{$transactions_tracks_id[$i]}/{$transactions_tracks_path[$i]}\">".SERVER_ADDRESS."/mp3/download/{$transactions_tracks_id[$i]}/{$transactions_tracks_path[$i]}</a><br /><br />\n";
    }
    $message.= '<br />
    Regards,<br />
    <br />
    ========================================================================<br />
    <br />
    <a href="'.SERVER_ADDRESS.'">SMASHINTRACKS.COM</a><br />
    <a href="'.SERVER_ADDRESS.'">http://www.smashintracks.com</a><br />
    </body>
    </html>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-2' . "\r\n";
    $headers .= 'From: SmashinTracks.com <office@smashintracks.com>' . "\r\n";
    $message_iso = iconv("UTF-8", "ISO-8859-2", $message);
    mail($to, $subject, $message_iso, $headers);
}

function mail_info($invoice, $num_cart_items, $track_name, $mc_gross, $payer_email, $txn_id) {
    $mail_content = "Transakcja pomyślnie zakończona. \nFaktura nr $invoice.\n\n Tracks: \n";
    for ($i = 1; $i <= $num_cart_items; $i++) {
        $mail_content.= $i.". ".$track_name[$i]."\n";
    }
    $mail_content.="\nKwota transakcji: $mc_gross\nKlient: $payer_email";
    //mail($notify_email, "SmashinTracks.com - Transakcja Pomyślnie Zakończona", $mail_content);
    $mail_name = "SmashinTracks.com";
    $mail_address = "no-reply@smashintracks.com";
    $mail_subject = "SmashinTracks.com - Transakcja Pomyślnie Zakończona";
    $attachment_name = 'inv_'.$invoice.'_log.txt';
    $attachment_content = "------------------------------------------------------------------------\n".date('d-m-Y h:i:s')." - INVOICE $invoice - TXNID - $txn_id\nPOST: ".print_r($_POST, true);
    mail_attachment_text("modul008@gmail.com, m.matuszewski@gmail.com", $mail_address, $mail_name, $mail_subject, $mail_content, $attachment_name, $attachment_content);
}



/////////////////////////////////////////////////
/////////////Begin Script below./////////////////
/////////////////////////////////////////////////

// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}
// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

// czyści log
$log = '';
$is_log = false;
$filename_log = '';
$transaction_success = false;

// If testing on Sandbox use:
//$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);


// assign posted variables to local variables
$item_name = $_POST['item_name'];
$business = $_POST['business'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$mc_gross = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$receiver_id = $_POST['receiver_id'];
$quantity = $_POST['quantity'];
$num_cart_items = $_POST['num_cart_items'];
$payment_date = $_POST['payment_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$payment_type = $_POST['payment_type'];
$payment_status = $_POST['payment_status'];
$payment_gross = $_POST['payment_gross'];
$payment_fee = $_POST['payment_fee'];
$settle_amount = $_POST['settle_amount'];
$memo = $_POST['memo'];
$payer_email = $_POST['payer_email'];
$txn_type = $_POST['txn_type'];
$payer_status = $_POST['payer_status'];
$address_street = $_POST['address_street'];
$address_city = $_POST['address_city'];
$address_state = $_POST['address_state'];
$address_zip = $_POST['address_zip'];
$address_country = $_POST['address_country'];
$address_status = $_POST['address_status'];
$item_number = $_POST['item_number'];
$tax = $_POST['tax'];
$option_name1 = $_POST['option_name1'];
$option_selection1 = $_POST['option_selection1'];
$option_name2 = $_POST['option_name2'];
$option_selection2 = $_POST['option_selection2'];
$for_auction = $_POST['for_auction'];
$invoice = (int)$_POST['invoice'];
$custom = $_POST['custom'];
$notify_version = $_POST['notify_version'];
$verify_sign = $_POST['verify_sign'];
$payer_business_name = $_POST['payer_business_name'];
$payer_id =$_POST['payer_id'];
$mc_currency = $_POST['mc_currency'];
$mc_fee = $_POST['mc_fee'];
$exchange_rate = $_POST['exchange_rate'];
$settle_currency  = $_POST['settle_currency'];
$parent_txn_id  = $_POST['parent_txn_id'];
$pending_reason = $_POST['pending_reason'];
$reason_code = $_POST['reason_code'];


// subscription specific vars

$subscr_id = $_POST['subscr_id'];
$subscr_date = $_POST['subscr_date'];
$subscr_effective  = $_POST['subscr_effective'];
$period1 = $_POST['period1'];
$period2 = $_POST['period2'];
$period3 = $_POST['period3'];
$amount1 = $_POST['amount1'];
$amount2 = $_POST['amount2'];
$amount3 = $_POST['amount3'];
$mc_amount1 = $_POST['mc_amount1'];
$mc_amount2 = $_POST['mc_amount2'];
$mc_amount3 = $_POST['mcamount3'];
$recurring = $_POST['recurring'];
$reattempt = $_POST['reattempt'];
$retry_at = $_POST['retry_at'];
$recur_times = $_POST['recur_times'];
$username = $_POST['username'];
$password = $_POST['password'];

//auction specific vars

$for_auction = $_POST['for_auction'];
$auction_closing_date  = $_POST['auction_closing_date'];
$auction_multi_item  = $_POST['auction_multi_item'];
$auction_buyer_id  = $_POST['auction_buyer_id'];

if (!$fp) {
    // HTTP ERROR
    startLog();
    addToLog("HTTP ERROR - line ".__LINE__);
} else {
    fputs ($fp, $header . $req);
    while (!feof($fp)) {
        $res = fgets ($fp, 1024);
        if (strcmp ($res, "VERIFIED") == 0) {
            startLog();
            addToLog("IPN VERIFIED START - line ".__LINE__);
            addToLog('Res: '.$res." - line ".__LINE__);
            addToLog('Req: '.$res." - line ".__LINE__);
            //create MySQL connection
            $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password);
            if(!$Connect) dieLog("DB CONNECTION ERROR". mysql_error() . " - " . mysql_errno(). " - line ".__LINE__);

            //select database
            $Db = @mysql_select_db($DB_DBName, $Connect);
            if(!$Db) dieLog("DB SELECT ERROR". mysql_error() . " - " . mysql_errno(). " - line ".__LINE__);

            $fecha = date("m")."/".date("d")."/".date("Y");
            $fecha = date("Y").date("m").date("d");

            //check if transaction ID has been processed before
            $checkquery = "select txnid from paypal_payment_info where txnid='".$txn_id."'";
            $sihay = mysql_query($checkquery);
            if(!$sihay) dieLog("Duplicate txn id check query failed: " . mysql_error() . " - " . mysql_errno(). " - line ".__LINE__);

            $nm = mysql_num_rows($sihay);

            if ($nm == 0){ //execute query
                /* DODANIE INFORMACJI O TRANSAKCJI START */
                $prize =  $num_cart_items*TRACK_PRIZE / 100;
                $prize_string = number_format($prize, 2);
                $error = false;
                if($mc_gross!=$prize_string) {
                    addToLog("ERROR = TRUE - BAD AMOUNT. Should be: $prize_string\tIs:$mc_gross\tprize - $prize\tprize_string - $prize_string\tmc_gross - $mc_gross - line ".__LINE__);
                    $error = true;
                }
                /* DODANIE INFORMACJI O TRANSAKCJI STOP */


                if ($txn_type == "cart"){
                 addToLog("txn_type = $txn_type - line ".__LINE__);
                 $strQuery = "insert into paypal_payment_info(paymentstatus,buyer_email,firstname,lastname,street,city,state,zipcode,country,mc_gross,mc_fee,memo,paymenttype,paymentdate,txnid,pendingreason,reasoncode,tax,datecreation) values ('".$payment_status."','".$payer_email."','".$first_name."','".$last_name."','".$address_street."','".$address_city."','".$address_state."','".$address_zip."','".$address_country."','".$mc_gross."','".$mc_fee."','".$memo."','".$payment_type."','".$payment_date."','".$txn_id."','".$pending_reason."','".$reason_code."','".$tax."','".$fecha."')";
                 $result = mysql_query($strQuery);
                 if(!$result) dieLog("Cart - paypal_payment_info, insert query failed: " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                 else addToLog("INSERT SUCCESS: $strQuery - rows: ".mysql_affected_rows()." - line ".__LINE__);

                /* DODANIE INFORMACJI O TRANSAKCJI START */
                if(!$error) {
                    $sql2 = "SELECT `profiles_id`  FROM `transactions` WHERE `transactions_id` = '$invoice' LIMIT 1";
                    $result2 = mysql_query($sql2);
                    $w2 = mysql_fetch_array($result2);
                    if($w2) {
                        $profiles_id = $w2['profiles_id'];
                         if($profiles_id) {
                             $transactions_path = null;
                             $sql3 = "UPDATE `transactions` SET `transactions_paymethod` = '1', `transactions_paypal_txnid` = '$txn_id', `transactions_date` =  NOW(), `transactions_done` = '1' WHERE `transactions`.`transactions_id` = '$invoice' LIMIT 1";
                         } else {
                             $transactions_path = generate_random_pass(32);
                             $sql3 = "UPDATE `transactions` SET `transactions_paymethod` = '1', `transactions_paypal_txnid` = '$txn_id', `transactions_date` =  NOW(), `transactions_done` = '1', `transactions_path` = '$transactions_path' WHERE `transactions`.`transactions_id` = '$invoice' LIMIT 1";
                         }
                        $result3 = mysql_query($sql3);
                        if(!$result3) {
                            addToLog("UPDATE FAILED - $sql3 - line ".__LINE__);
                        } else {
                            addToLog("UPDATE SUCCESS: $sql3 - rows: ".mysql_affected_rows()." -  line ".__LINE__);
                        }


                        /*
                         * DOKOŃCZYĆ
                        $sql4 = "UPDATE `profiles` SET `profiles_balance` = '1', `transactions_paypal_txnid` = '$txn_id', `transactions_date` =  NOW(), `transactions_done` = '1' WHERE `transactions`.`transactions_id` = '$invoice' LIMIT 1";
                        $result3 = mysql_query($sql4);
                        if(!$result3) {
                            addToLog("UPDATE FAILED - $sql4 - line ".__LINE__);
                        } else {
                            addToLog("UPDATE SUCCESS: $sql4 - rows: ".mysql_affected_rows()." -  line ".__LINE__);
                        }
                         *
                         */
                    } else {
                      addToLog("SELECT FAILED - $sql2 - line ".__LINE__);
                    }
                } else {
                  addToLog("SELECT & UPDATE `transactions` SKIPPED (error = true) - line ".__LINE__);
                }
                /* DODANIE INFORMACJI O TRANSAKCJI STOP */

                 for ($i = 1; $i <= $num_cart_items; $i++) {
                     $itemname = "item_name".$i;
                     $itemnumber = "item_number".$i;
                     $on0 = "option_name1_".$i;
                     $os0 = "option_selection1_".$i;
                     $on1 = "option_name2_".$i;
                     $os1 = "option_selection2_".$i;
                     $quantity = "quantity".$i;

                     $struery = "insert into paypal_cart_info(txnid,itemnumber,itemname,os0,on0,os1,on1,quantity,invoice,custom) values ('".$txn_id."','".$_POST[$itemnumber]."','".$_POST[$itemname]."','".$_POST[$on0]."','".$_POST[$os0]."','".$_POST[$on1]."','".$_POST[$os1]."','".$_POST[$quantity]."','".$invoice."','".$custom."')";
                     $result = mysql_query($struery);
                     if(!$result) dieLog("Cart - paypal_cart_info, Query failed: " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                     else addToLog("INSERT SUCCESS: $struery - rows: ".mysql_affected_rows()." - line ".__LINE__);

                     /* DODANIE INFORMACJI O TRANSAKCJI START */
                     if(!$error) {
                         $in = $_POST[$itemnumber];
                         $invoice_check = (int)substr($in, 0, strpos($in, ' ')); // = invoice
                         if($invoice_check==$invoice) {
                             $invoice_rest = substr($in, strpos($in, ' '));
                             $track_id[$i] = (int)substr($invoice_rest, 0, strpos($invoice_rest, '-'));
                             $track_name[$i] = $_POST[$itemname]; // potrzebne do mejla na końcu
                             $artist_id[$i] = (int)substr($invoice_rest, strpos($invoice_rest, '-')+1);

                             $checkquery2 = "SELECT `tracks_id` FROM `tracks` WHERE `tracks_id` = '$track_id[$i]' AND `profiles_id` = '$artist_id[$i]' LIMIT 1";
                             $sihay2 = mysql_query($checkquery2);
                             if(!$sihay2) dieLog("Artist id check query failed: sql - $checkquery2 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);

                             $nm = mysql_num_rows($sihay2);
                             if ($nm == 1){
                                 $transactions_tracks_path[$i] = generate_random_pass(32);
                                 $struery2 = "INSERT INTO `transactions_tracks` (`transactions_tracks_id`, `transactions_id`, `tracks_id`, `transactions_tracks_path`) VALUES (NULL, '$invoice', '$track_id[$i]', '$transactions_tracks_path[$i]');";
                                 $result2 = mysql_query($struery2);
                                 if(!$result2) dieLog("Transactions tracks insert query failed: sql - $struery2 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                                 else addToLog("INSERT SUCCESS: $struery2 - rows: ".mysql_affected_rows()." - line ".__LINE__);

                                 $transactions_tracks_id[$i] = mysql_insert_id();

                                 /*
                                  * ARTIST ACCOUNT
                                  */
                                 $struery3 = "INSERT INTO `transactions_saldo` (`transactions_saldo_id`, `transactions_tracks_id`, `profiles_id`, `transactions_saldo_value`) VALUES (NULL, '$transactions_tracks_id[$i]', '$artist_id[$i]', '".TRACK_PRIZE_HALF."');";
                                 $result3=mysql_query($struery3);
                                 if(!$result3) dieLog("Transactions saldo(1) insert query failed: sql - $struery3 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                                 else addToLog("INSERT SUCCESS: $struery3 - rows: ".mysql_affected_rows()." - line ".__LINE__);

                                 $struery3_2 = "UPDATE `profiles` SET `profiles_balance` = `profiles_balance` + '".TRACK_PRIZE_HALF."'  WHERE `profiles_id` = '$artist_id[$i]' LIMIT 1;";
                                 $result3_2=mysql_query($struery3_2);
                                 if(!$result3_2) dieLog("Profiles balance(1) update query failed: sql - $struery3_2 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                                 else addToLog("UPDATE SUCCESS: $struery3_2 - rows: ".mysql_affected_rows()." - line ".__LINE__);
                                 

                                 /*
                                  * ADMIN ACCOUNT
                                  */
                                 $struery4 = "INSERT INTO `transactions_saldo` (`transactions_saldo_id`, `transactions_tracks_id`, `profiles_id`, `transactions_saldo_value`) VALUES (NULL, '$transactions_tracks_id[$i]', '".ADMIN_PROFILE."', '".TRACK_PRIZE_HALF."');";
                                 $result4=mysql_query($struery4);
                                 if(!$result4) dieLog("Transactions saldo(2) insert query failed: sql - $struery4 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                                 else addToLog("INSERT SUCCESS: $struery4 - rows: ".mysql_affected_rows()." - line ".__LINE__);
                                 
                                 $struery4_2 = "UPDATE `profiles` SET `profiles_balance` = `profiles_balance` + '".TRACK_PRIZE_HALF."'  WHERE `profiles_id` = '".ADMIN_PROFILE."' LIMIT 1;";
                                 $result4_2=mysql_query($struery4_2);
                                 if(!$result4_2) dieLog("Profiles balance(2) update query failed: sql - $struery4_2 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                                 else addToLog("UPDATE SUCCESS: $struery4_2 - rows: ".mysql_affected_rows()." - line ".__LINE__);

                                 /*
                                  * CUSTOMER ACCOUNT
                                  */
                                 if($profiles_id) {
                                     $struery5 = "INSERT INTO `transactions_saldo` (`transactions_saldo_id`, `transactions_tracks_id`, `profiles_id`, `transactions_saldo_value`) VALUES (NULL, '$transactions_tracks_id[$i]', '$profiles_id', '-".TRACK_PRIZE."');";
                                 } else {
                                     $struery5 = "INSERT INTO `transactions_saldo` (`transactions_saldo_id`, `transactions_tracks_id`, `profiles_id`, `transactions_saldo_value`) VALUES (NULL, '$transactions_tracks_id[$i]', NULL, '-".TRACK_PRIZE."');";
                                 }
                                 $result5=mysql_query($struery5);
                                 if(!$result5) dieLog("Transactions saldo(3) insert query failed: sql - $struery5 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                                 else addToLog("INSERT SUCCESS: $struery5 - rows: ".mysql_affected_rows()." - line ".__LINE__);
                             } else {
                                 addToLog("Artist id check query wrong num rows: sql - $checkquery2 - rows - $nm - line ".__LINE__);
                             }
                          } else {
                              addToLog("Invoice check failed - invoice: $invoice\tinvoice_check: $invoice_check\t - line ".__LINE__);
                          }
                      } else {
                          addToLog("SELECT & UPDATE `transactions_tracks` & `transactions_saldo` SKIPPED (error = true) - line ".__LINE__);
                      }
                      /* DODANIE INFORMACJI O TRANSAKCJI STOP */
                 }
                } else{
                 addToLog("txn_type != cart = $txn_type - line ".__LINE__);
                 $strQuery = "insert into paypal_payment_info(paymentstatus,buyer_email,firstname,lastname,street,city,state,zipcode,country,mc_gross,mc_fee,itemnumber,itemname,os0,on0,os1,on1,quantity,memo,paymenttype,paymentdate,txnid,pendingreason,reasoncode,tax,datecreation) values ('".$payment_status."','".$payer_email."','".$first_name."','".$last_name."','".$address_street."','".$address_city."','".$address_state."','".$address_zip."','".$address_country."','".$mc_gross."','".$mc_fee."','".$item_number."','".$item_name."','".$option_name1."','".$option_selection1."','".$option_name2."','".$option_selection2."','".$quantity."','".$memo."','".$payment_type."','".$payment_date."','".$txn_id."','".$pending_reason."','".$reason_code."','".$tax."','".$fecha."')";
                 $result = mysql_query($strQuery);
                 if(!$result) {
                    addToLog("Paypal_payment_info insert query failed: sql - $strQuery - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                    saveLog();
                    die();
                 } else {
                    addToLog("INSERT SUCCESS: $strQuery - rows: ".mysql_affected_rows()." - line ".__LINE__);
                 }
                }
                 addToLog("IPN VERIFIED END - line ".__LINE__);
                 if(!$error) $transaction_success = true;
            } else {
                 addToLog("VERIFIED DUPLICATED TRANSACTION");
            }


            if ( $txn_type == "subscr_signup"  ||  $txn_type == "subscr_payment"  ) { //subscription handling branch
              $strQuery = "insert into paypal_payment_info(paymentstatus,buyer_email,firstname,lastname,street,city,state,zipcode,country,mc_gross,mc_fee,memo,paymenttype,paymentdate,txnid,pendingreason,reasoncode,tax,datecreation) values ('".$payment_status."','".$payer_email."','".$first_name."','".$last_name."','".$address_street."','".$address_city."','".$address_state."','".$address_zip."','".$address_country."','".$mc_gross."','".$mc_fee."','".$memo."','".$payment_type."','".$payment_date."','".$txn_id."','".$pending_reason."','".$reason_code."','".$tax."','".$fecha."')";
              $result = mysql_query($strQuery); // insert subscriber payment info into paypal_payment_info table
              if(!$result) dieLog("Subscription - paypal_payment_info, Query failed: sql - $strQuery - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
              else addToLog("INSERT SUCCESS: $strQuery - rows: ".mysql_affected_rows()." - line ".__LINE__);

              $strQuery2 = "insert into paypal_subscription_info(subscr_id , sub_event, subscr_date ,subscr_effective,period1,period2, period3, amount1 ,amount2 ,amount3,  mc_amount1,  mc_amount2,  mc_amount3, recurring, reattempt,retry_at, recur_times, username ,password, payment_txn_id, subscriber_emailaddress, datecreation) values ('".$subscr_id."', '".$txn_type."','".$subscr_date."','".$subscr_effective."','".$period1."','".$period2."','".$period3."','".$amount1."','".$amount2."','".$amount3."','".$mc_amount1."','".$mc_amount2."','".$mc_amount3."','".$recurring."','".$reattempt."','".$retry_at."','".$recur_times."','".$username."','".$password."', '".$txn_id."','".$payer_email."','".$fecha."')";
              $result = mysql_query($strQuery2); // insert subscriber info into paypal_subscription_info table
              if(!$result) {
                addToLog("Subscription - paypal_subscription_info, Query failed: sql - $strQuery2 - " . mysql_error() . " - " . mysql_errno()." - line ".__LINE__);
                saveLog();
                die();
              } else {
                addToLog("INSERT SUCCESS: $strQuery2 - rows: ".mysql_affected_rows()." - line ".__LINE__);
              }
            }
        } elseif (strcmp ($res, "INVALID") == 0) { // if the IPN POST was 'INVALID'...do this
            startLog();
            addToLog("INVALID IPN");
        } //else {mail($notify_email, "END ELSE REACHED", "END ELSE REACHED $res");}
    }
    fclose ($fp);
    saveLog();
    if($transaction_success) {
        mail_info($invoice, $num_cart_items, $track_name, $mc_gross, $payer_email, $txn_id);
        mail_download_links($to, $num_cart_items, $track_name, $transactions_tracks_id, $transactions_tracks_path, $invoice, $transactions_path, $invoice);
    }
}
?>