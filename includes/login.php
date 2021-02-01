<?php

session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
}

function cryptoHash($password)
{
    $bagPassword = '';

    for ($pos = 0; $pos < strlen($password); $pos++) {
        $newPassword = ord($password[$pos]) + 1;
        $bagPassword .= chr($newPassword);
    }

    return $bagPassword;
}

function generateHash($password)
{
    $hash = password_hash(cryptoHash($password), PASSWORD_DEFAULT);
    return $hash;
}

function testedHash($password, $hash)
{
    $testHash = password_verify($password, $hash);
    return $testHash;
}
