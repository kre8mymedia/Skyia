<?php

$dir = "./pictures";

$files = scandir($dir);
array_shift($files);
array_shift($files);

if (count($files) > 1) {
	$serial_files = [];

	foreach ($files as $key => $file) {
		$img = file_get_contents("./pictures/". $file);
		$data = base64_encode($img);
		
		$ciphering = "AES-128-CTR";
		$iv_leng = openssl_cipher_iv_length($ciphering);
		$options = 0;
		$encryption_iv = '1234567891011121';
		$encryption_key = 'summer2019';
		$encryption = openssl_encrypt($data, $ciphering, $encryption_key, $options, $encryption_iv);
		
		array_push($serial_files, $encryption . ",\n");
	}
	print_r("Files returned: " . count($serial_files) . "\n");
	echo "File length: " . file_put_contents("./img-data.txt", $serial_files) . "\n";
	
} else {
	echo "Less than amount\n";
}
