<?php 

function clean_phone_number($phone) {
    // Supprimer tout sauf chiffres et "+" en début
    $phone = trim($phone);
    $phone = preg_replace('/[^0-9\+]/', '', $phone);

    // Si le "+" n'est pas au début, on le supprime
    if (strpos($phone, '+') > 0) {
        $phone = str_replace('+', '', $phone);
    }

    return $phone;
}