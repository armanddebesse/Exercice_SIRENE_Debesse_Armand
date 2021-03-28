<?php

//fonction qui récupère les infos dans l'api
function searchEntreprise($entreprise){
    $curl = curl_init();

    $opts = [
        CURLOPT_URL => 'https://entreprise.data.gouv.fr/api/sirene/v3/etablissements/' . $entreprise,
        CURLOPT_RETURNTRANSFER => true
    ];

    curl_setopt_array($curl, $opts);

    $response = curl_exec($curl);

    echo $response;
}


if($_SERVER['REQUEST_METHOD']=="GET") {
    $function = $_GET['call'];
    $arg = $_GET['argument'];
    if(function_exists($function)) {        
        call_user_func($function, $arg);
    } else {
        echo 'Function Not Exists!!';
    }
    }