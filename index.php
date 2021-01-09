<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project PHP</title>
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/funcoes.php";
    ?>

    <div id="body">
        <img src="icons/logo.jpg" class="logo" />
        <table class="listing">
            <pre><?php
                    $search = $bank->query("select * from jogos");

                    if (!$search) {
                        echo "Query está errada $bank->error";
                    } else {
                        if ($search->num_rows < 1) {
                            echo "<tr><td>Nenhum registro encontrado!</td></tr>";
                        } else {
                            while ($reg = $search->fetch_object()) {
                                $cover = thumb($reg->capa);
                                // $searchG = $bank->query("select j.nome, g.genero, p.produtora from jogos j join genero g on j.genero = g.cod join produtora p on j.produtora = p.cod");
                                // $reg2 = $searchG->fetch_object();
                                echo "<tr><td><img src='$cover' class='cover'/></td>";
                                echo "<td><a href='detais.php?cod=$reg->cod'>$reg->nome</a></td>";
                                echo "<td>Options</td></tr>";
                            }
                        }
                    }
                    ?>
        </table>
    </div>
    <?php $bank->close(); ?>
</body>
</html>