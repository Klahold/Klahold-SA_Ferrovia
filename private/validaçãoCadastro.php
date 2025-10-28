<?php
function validar_email_zerobounce($email) {
    $apiKey = "686fd53c4cc343c3af5c63a25fd27b1e";
    $url = "https://api.zerobounce.net/v2/validate?api_key=$apiKey&email=" . urlencode($email);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);
    return isset($data['status']) ? $data['status'] : 'unknown';
}
