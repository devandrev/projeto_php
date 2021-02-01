<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo</title>
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

    <div id="body">
        <table class="detais">
            <?php
            include_once "header.php";
            ?>

            <?php
            $cod = $_GET['cod'] ?? 0;
            $search = $bank->query("select * from jogo where cod=$cod");
            ?>

            <?php
            echo "<h1>Detalhes do Jogo</h1>";

            if (!$search) {
                echo "Jogo não encontrado, tente novamente mais tarde! $bank->error";
            } else {
                if ($search->num_rows != 1) {
                    echo "<tr><td>Nenhum jogo encontrado!</td></tr>";
                } else {
                    $reg = $search->fetch_object();
                    $cover = thumb($reg->capa);
                    echo "<tr><td rowspan='3'><img src='$cover' class='cover2'/></td>";
                    echo "<td><h2>$reg->nome</h2>";
                    echo "<h4>Nota: $reg->nota/10</h4>";
                    echo "<tr><td>$reg->descricao</td></tr>";
                    echo "<tr><td>Options</td></tr>";
                }
            }
            ?>
        </table>
        <a href="../index.php"><i class="material-icons md-48">arrow_back</i></a>
    </div>
    <?php include_once "footer.php" ?>
</body>

</html>