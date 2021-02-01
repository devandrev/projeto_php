<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão de Login</title>
    <link rel="shortcut icon" href="icons/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/functions.php";
    require_once "includes/login.php";
    ?>

    <div id="user-body">
        <div id="icon-user"><i class="material-icons">account_circle</i></div>

        <div>
            <?php
            $user = $_POST['usuario'] ?? null;
            $password = $_POST['senha'] ?? null;

            if (is_null($user) || is_null($password)) {
                require "user-login-form.php";
            } else {
                $sql = $bank->query("select * from usuario where usuario = '%$user%'");

                if ($sql->num_rows >= 1) {
                    while ($reg = $sql->fetch_array()) {
                        $_SESSION['user'] = $reg['user'];
                        $_SESSION['nome'] = $reg['nome'];
                        $_SESSION['tipo'] = $reg['tipo'];
                        echo "$reg->nome";
                    }
                }

                echo msg_susccess("Dados foram encontrados....");
                header("refresh:2; url=index.php");
            }
            ?>
        </div>
    </div>
</body>

</html>