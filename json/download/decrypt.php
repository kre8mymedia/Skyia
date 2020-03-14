<?php

$decryption_key = 'ryaneggleston';
$hash = 'IACcHdRp44LFFFq9fH2AYrFyaDVBOeko5HofSfNf8Tvi5g';

$url = 'https://siasky.net/' . $hash;

// Get encrypted string contents
$encryted_str = file_get_contents($url);

// Explode string to an array at commas
$encrypt_arr = explode(",", $encryted_str);

// Remove extra from end (created by last comma)
array_pop($encrypt_arr);

$i = 0;
$ciphering = "AES-128-CTR";
$decryption_iv = "1234567891011121";
$options = 0;
foreach ($encrypt_arr as $key => $encryption) {
 
  $decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

  // echo "Decrypted string: " . $decryption . "\n";
  $file = base64_decode($decryption);
  $i++;

  echo "Bytes in File: " . file_put_contents("./files/". (time() + $i) . "_data.json", $file) . "\n";
}