<?php
$dataArr = '';
$data = json_encode($dataArr);
var_dump($data);
$time = time();
$resId = curl_init();
$token = getToken('company/get-state',
    $time,'616a2cbbc392c798c06161dae2bd0c2093af4f399e95f48d',
    $data,'84c29e3807ccb092f50ea7e66537ba9b519628efdd741046');
curl_setopt_array($resId, [
    CURLINFO_HEADER_OUT => true,
    CURLOPT_HEADER => 0,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer '.$token ,
        'Content-Type: application/json' ,
    ],
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_URL => 'https://api.new-tel.net/company/get-state',
    CURLOPT_POSTFIELDS => $data,
]);
$response = curl_exec($resId);
$curlInfo = curl_getinfo($resId);

var_dump($response);

function getToken ($methodName , $time , $keyNewtel , $params ,
                   $writeKey)
{
    return $keyNewtel.$time.hash('sha256' ,
            $methodName."\n".$time."\n".$keyNewtel."\n".
            $params."\n".$writeKey);
}
