<?php

  $transaction = file_get_contents('php://input');

    // Change "app.sandbox.midtrans.com" to "app.midtrans.com" when you are deploying to production environment 

   $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://app.midtrans.com/snap/v1/transactions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $transaction,
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "Authorization: Basic TWlkLXNlcnZlci1FX09UY2tCZzJMMGEwMmVzNkxMX3N1SUw6", 
"cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}