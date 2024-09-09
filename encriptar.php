<?php
$clave = 'V1CT0R_R@UL_H@Y@_D3_L@_TORR3';

// Método de encriptación
$method = 'aes-256-cbc';

$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");

// Encripta el contenido de la variable enviada como parámetro
$encriptar = function ($valor) use ($method, $clave, $iv) {
    return openssl_encrypt($valor, $method, $clave, false, $iv);
};

// Desencripta el texto recibido
$desencriptar = function ($valor) use ($method, $clave, $iv) {
    $encrypted_data = base64_decode($valor);
    return openssl_decrypt($valor, $method, $clave, false, $iv);
};

// Genera un valor para IV
$getIV = function () use ($method) {
    return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
};