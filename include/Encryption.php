<?php
function Five_Encrypt($Encrypt,$key)
{
	$Encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $Encrypt, MCRYPT_MODE_CBC, md5(md5($key))));
	return $Encrypted;
}

function Five_Decrypt($Decrypt, $key)
{
	$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($Decrypt), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	return $decrypted;	
}
?>