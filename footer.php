<?php
    echo "<footer class='footer'>";
    echo "Acessado por " . $_SERVER['REMOTE_ADDR'] . " em " . date('d/m/y');
    echo "<br>Desenvolvido por André Valverde em 2021";
    echo "</footer>";
    $bank->close();
?>