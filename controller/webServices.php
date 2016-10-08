<?php 
require_once("../config.php");

$parametros=array(); //parametros de la llamada
$parametros['api_key']= API_KEYs_WS;
$parametros['lat'] = 40;
$parametros['lon'] = -105;
$param = "api_key=".$parametros['api_key']."&lat=".$parametros['lat']."&lon=".$parametros['lon'];

$url="https://developer.nrel.gov/api/solar/solar_resource/v1.json?".$param; //url del servicio

$client = curl_init($url);
//curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
//curl_setopt($client, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1");
        //curl_setopt($client, CURLOPT_HEADER, false);
        //curl_setopt($client, CURLOPT_HTTPHEADER, array("Accept-Language: es-es,en"));
        curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($client, CURLOPT_SSL_VERIFYHOST, false);
        //curl_setopt($client, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($client, CURLOPT_RETURNTRANSFER,true);
        //curl_setopt($client, CURLOPT_CONNECTTIMEOUT, 5);
        //curl_setopt($client, CURLOPT_TIMEOUT, 60);
        //curl_setopt($client, CURLOPT_AUTOREFERER, TRUE);
$response = curl_exec($client);

//$result = json_decode($response,CURLOPT_POST,$request);
if ($response === false) {
	$info = curl_getinfo($client);
    curl_close($client);
    die('error occured during client exec. Additioanl info: ' . var_export($info));
}

if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}

$decoded = json_decode($response);

print_r($decoded->outputs->avg_ghi->monthly);


?>