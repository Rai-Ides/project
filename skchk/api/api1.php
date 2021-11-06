<?php
error_reporting(0);
# SK Check Script by Arceus @rceus

# functions 
function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

# variables
$sklive = $_GET['lista'];

# first req
$ch = curl_init('https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$postfield = 'card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235';
curl_setopt_array($ch, [CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_POSTFIELDS => $postfield, CURLOPT_USERPWD => $sklive. ':' . '']);
echo $curl = curl_exec($ch);

# useless shit
$code = trim(strip_tags(getStr($curl,'"code": "','"')));
$msg = trim(strip_tags(getStr($curl,'"message": "','"')));
$dcode = trim(strip_tags(getStr($curl,'"decline_code": "','"')));
if(!$dcode){
  $dcode = "None";
}

# responses 
if (strpos($curl, 'api_key_expired')){
  echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #fff">'.$sklive.'</span> <span style="color: #FFA500">API KEY EXPIRED</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus</span>';
} else if (strpos($curl, 'Invalid API Key provided')){
  echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #fff">'.$sklive.'</span> <span style="color: #FFA500">INVALID KEY PROVIDED</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus</span>';
} else if ((strpos($curl, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
  echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #fff">'.$sklive.'</span> <span style="color: #FFA500">TESTMODE CHARGES ONLY</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus</span>';
} else {
  echo '<span class="badge bg-success">#LIVE</span> <span style="color: #FFFFFF">|</span> <span style="color: #fff">'.$sklive.'</span> <span style="color: #FFA500">SK LIVE</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus</span>';
}
?>