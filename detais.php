<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Jogo</title>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    ?>

    <div id="body">
        <table class="detais">
            <?php
            $cod = $_GET['cod'] ?? 0;

            $search = $bank->query("select * from jogos where cod=$cod");

            if (!$search) {
                echo "Jogo não encontrado, tente novamente mais tarde! $bank->error";
            } else {
                if ($search->num_rows < 1) {
                    echo "<tr><td>Nenhum jogo encontrado!</td></tr>";
                } else {
                    echo "<tr><td>Foto</td></tr>";
                    echo "<tr><td>Nome do Jogo</td><td>Descrição</td></tr>";
                    echo "<tr><td>Options</td></tr>";
                }
            }
            ?>
        </table>
    </div>
    <?php $bank->close(); ?>
</body>
</html>