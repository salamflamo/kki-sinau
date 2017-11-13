<?php
//step 1
$curl = curl_init();

// step 2
curl_setopt($curl,CURLOPT_URL,"http://www.google.com/search?q=curl");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_HEADER,false);

//step 3
$hasil = curl_exec($curl);

// step 4
curl_close($curl);

//step 5
echo $hasil;
