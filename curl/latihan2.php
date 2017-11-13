<?php

$curl = curl_init();

$header = array(
  'Content-Type: application/json; charset=UTF-8' ,
  'Client-Service: frontend-client',
  'Auth-Key: gmedia_kuliner'
);

curl_setopt($curl,CURLOPT_URL,"https://salamflamo.xyz/services/restoran");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_HTTPGET,true);

$hasil = curl_exec($curl);

curl_close($curl);

var_dump(json_decode($hasil)) ;
