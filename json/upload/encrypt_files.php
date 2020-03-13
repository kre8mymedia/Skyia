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

///////      PASSWORD     ////////
$encryption_key = 'ryaneggleston';

// Set empty STRING'd data array
$serial_files = [];

// if the count is greater than 1
if (count($files) > 1) {

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

// if count of files was less than 1
} else {
	echo "Less than amount\n";
}