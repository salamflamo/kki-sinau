<?php

$curl = curl_init();

$header = array(
  'Content-Type: application/json; charset=UTF-8' ,
  'Client-Service: frontend-client',
  'Auth-Key: gmedia_kuliner',
  'Content-Type: application/json'
);

$fields = array('id_restoran' => 27,);

curl_setopt($curl,CURLOPT_URL,"https://salamflamo.xyz/services/single");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($fields));

$hasil = curl_exec($curl);

curl_close($curl);

var_dump(json_decode($hasil)) ;
