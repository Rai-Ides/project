<?php

$curl = curl_init();

$headers = array();
$postfield = 'username=midnight&password=midnsightx';

curl_setopt_array($curl, [
   CURLOPT_URL => 'https://bontenchkbackend.ruyichann.repl.co/api/login',
   CURLOPT_POST => 1,
   CURLOPT_POSTFIELDS => $postfield,
   CURLOPT_FOLLOWLOCATION => 1,
   CURLOPT_RETURNTRANSFER => 1,
   CURLOPT_SSL_VERIFYPEER => 0,
   CURLOPT_SSL_VERIFYHOST => 0,
]);
echo $exe = curl_exec($curl);
##################################
?>