<?php
echo "<header>";

if (empty($_SESSION['user'])) {
    echo "<a href='user-login.php'><i class='material-icons md-36'>assignment_ind</i></a>";
} else {
    echo "Olá, ", $_SESSION['nome'];
}

echo "</header>";
