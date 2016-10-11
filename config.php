<?php
    session_start();
    define('DB_HOST','localhost');
    define('DB_USER','usercalculador');
    define('DB_PASS','calculador');
    define('DB_NAME','bdcalculador');

    define('RUTA','/calculador/');
    define('TITULO','Calculadora Solar');
    define('RUTA_MENU','/calculador/_menu.php');
    define('URL_WS','https://developer.nrel.gov/api/solar/solar_resource/v1.json?');
    define('API_KEYs_WS','APRiwR1out6npKjLqTBvhntJeckVzqeCRGahs6Tg');
    define('API_KEY_GOOGLE_MAPS','AIzaSyC89hnl-pGGuKuSLAoqNL6uQcRxNMsUDjw');
    /* 
    - Ejemplo servicio web
    https://developer.nrel.gov/api/solar/solar_resource/v1.json?api_key=DEMO_KEY&lat=40&lon=-105 
    */
?>