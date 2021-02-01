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
        <table class="configgame">
            <?php
            include_once "header.php";
            ?>

            <?php
            $cod = $_GET['cod'] ?? 0;
            $search = $bank->query("select * from jogo where cod=$cod");
            ?>

            <?php
            echo "<h1>Alterar detalhes do Jogo</h1>";

            if (!$search) {
                echo "Jogo não encontrado, tente novamente mais tarde! $bank->error";
            } else {
                if ($search->num_rows != 1) {
                    echo "<tr><td>Nenhum jogo encontrado!</td></tr>";
                } else {
                    $reg = $search->fetch_object();
                    $cover = thumb($reg->capa);
                    echo "<tr><td rowspan='3'><img src='$cover' class='cover2'/></td>";
                    echo "<td><label for=''>Nome:</label></td>";
                    echo "<td><input type='text' name='name' id='name'></td>";
                    echo "<tr><br>";
                    echo "<td><label for=''>Nota:</label></td>";
                    echo "<td><input type='text' name='note' id='note'></td>";
                    echo "<tr><br>";
                    echo "<td><label for=''>Descrição:</label></td>";
                    echo "<td><input type='textarea' name='description' id='description'></td>";
                    echo "<tr><td><td rowspan='3'><input type='submit' value='Alterar'></td>";
                }
            }
            ?>
        </table>
        <a href="../index.php"><i class="material-icons md-48">arrow_back</i></a>
    </div>
    <?php include_once "footer.php" ?>
</body>

</html>