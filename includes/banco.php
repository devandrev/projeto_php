<?php
$bank = new mysqli("localhost", "root", "", "project_games");

if ($bank->connect_errno) {
    echo "<h2>Deu erro! $bank->errno --> $bank->connect_error</h2>";
    die();
}

$bank->query("SET NAME 'utf8'");
$bank->query("SET character_set_connection=utf8");
$bank->query("SET character_set_client=utf8");
$bank->query("SET character_set_results=utf8");
?>