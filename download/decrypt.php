<?php

$url = 'https://siasky.net/AAAjtMEbjb820YRwh21LYgrLu8beO6-cwMvQcKylhy4fIw';

// Get encrypted string contents
$encryted_str = file_get_contents($url);

// Explode string to an array at commas
$encrypt_arr = explode(",", $encryted_str);

// Remove extra from end (created by last comma)
array_pop($encrypt_arr);

$i = 0;
$ciphering = "AES-128-CTR";
$decryption_key = 'My_Made_Up_Key';
$options = 0;
$decryption_iv = "1234567891011121";
foreach ($encrypt_arr as $key => $encryption) {
 
  $decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

  // echo "Decrypted string: " . $decryption . "\n";
  $picture = base64_decode($decryption);
  $i++;

  echo "Bytes in File: " . file_put_contents("./pictures/". (time() + $i) . "_192.168.1.9.jpg", $picture) . "\n";
}