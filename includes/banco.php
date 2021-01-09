<?php
$bank = new mysqli("localhost", "root", "", "project_games");

if ($bank->connect_errno) {
    echo "<h2>Deu erro! $bank->errno --> $bank->connect_error</h2>";
    die();
}

// $busca = $banco->query("select * from jogos");

// if (!$busca) {
//     echo "<h2>Deu erro! Número do erro é $banco->errno --> $banco->connect_error</h2>";
// } else {
//     while ($reg = $busca->fetch_object()) {
//         print_r($reg);
//     }
// }
?>