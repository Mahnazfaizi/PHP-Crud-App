<?php 
// Encrypt cookie
function encryptCookie( $value ) {

    $key = hex2bin(openssl_random_pseudo_bytes(4));
 
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
 
    $ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);
 
    return( base64_encode($ciphertext . '::' . $iv. '::' .$key) );
 }

 // Decrypt cookie
function decryptCookie( $ciphertext ) {

    $cipher = "aes-256-cbc";
 
    list($encrypted_data, $iv,$key) = explode('::', base64_decode($ciphertext));
    return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);
 
 }

?>