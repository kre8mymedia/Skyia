<?php
// Specify the root directory for upload files
$dir = "./files";

// List files inside dir
$files = scandir($dir);
// Remove unecessaries
array_shift($files);
array_shift($files);

// Set constants
$ciphering = "AES-128-CTR";
$iv_leng = openssl_cipher_iv_length($ciphering);
$options = 0;
// Set encryption keys
$encryption_iv = '1234567891011121';

function generateRandomString($length = 64) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

// File Type to append to end of argv
$file_type = 'txt';
// Get repo name from argv
if(isset($argv[1])) {
	$repo = $argv[1];
} else {
	$repo = "Default_Name";
}
// Generate Random 64bit characterString
$encryption_key = generateRandomString();

// Set empty STRING'd data array
$serial_files = [];

// if the count is greater than 1
if (count($files) > 0) {

	// For each file in files
	foreach ($files as $key => $file) {
		// set the contents equal to variable
		$content = file_get_contents("./files/". $file);
		// encode the contents into a readable STRING for the openSSL function
		$data = base64_encode($content);
		// push this value to the serial files array
		$encryption = openssl_encrypt($data, $ciphering, $encryption_key, $options, $encryption_iv);
		array_push($serial_files, $encryption . ",\n");
	}
	
	// Print some basic details to the console
	print_r("Files returned: " . count($serial_files) . "\n");
	echo "File length: " . file_put_contents("./img-data.txt", $serial_files) . "\n";
	$address_book = file_get_contents("../../address_book.json");

	$new_book = str_replace('}
}', '},
 "' . $repo . ".". $file_type .'": {
   "address": "HAVE NOT FILLED IN NEW ADDRESS FROM UPLOAD.PY",
   "password": "'. $encryption_key .'"
  }
}', $address_book);

file_put_contents("../../address_book.json", $new_book);
// if count of files was less than 1
} else {
	echo "Less than amount\n";
}