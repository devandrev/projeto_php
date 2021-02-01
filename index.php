<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project PHP</title>
    <link rel="shortcut icon" href="icons/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/functions.php";
    require_once "includes/login.php";

    $order = $_GET['o'] ?? "n";
    $key = $_GET['c'] ?? "";
    ?>

    <div id="body">
        <?php
        include_once "header.php";
        ?>

        <img src="icons/logo.png" class="logo" />

        <!-- Form usado para ordenação da lista de jogos -->
        <form action="index.php" id='search' method="get">
            <i>Ordernar: <a href='index.php?o=n&c=<?php echo $key; ?>' class='order'>Nome |</a>
                <a href='index.php?o=p&c=<?php echo $key; ?>' class='order'> Produtora |</a>
                <a href='index.php?o=n1&c=<?php echo $key; ?>' class='order'> Nota Alta |</a>
                <a href='index.php?o=n2&c=<?php echo $key; ?>' class='order'> Nota Baixa |</a></i>
            <a href="index.php" class='order'> Mostrar Todos |</a>
            <i>Buscar: <input type="text" name="c" size="10" maxlength="40"></i>
            <input type="submit" value="Buscar">
        </form>

        <?php
        $query = " select j.cod, j.nome, j.nota, g.genero, p.produtora, j.capa from jogo j join genero g on 
        j.genero = g.cod join produtora p on j.produtora = p.cod ";

        if (!empty($key)) {
            $query .= "where j.nome like '%$key%' or p.produtora like '%$key%' or g.genero like '%$key%' ";
        }

        switch ($order) {
            case "p":
                $query .= "ORDER BY p.produtora";
                break;

            case "n1":
                $query .= "ORDER BY j.nota DESC";
                break;

            case "n2":
                $query .= "ORDER BY j.nota";
                break;

            default:
                $query .= "ORDER BY j.nome";
        }

        $search = $bank->query($query); ?>

        <table class="listing">
            <?php
            if (!$search) {
                echo "Query está errada $bank->error";
            } else {
                if ($search->num_rows < 1) {
                    echo "<tr><td>Nenhum registro encontrado!</td></tr>";
                } else {
                    while ($reg = $search->fetch_object()) {
                        $cover = thumb($reg->capa);
                        echo "<tr><td><img src='$cover' class='cover'/></td>";
                        echo "<td><a href='detais.php?cod=$reg->cod'>$reg->nome</a><br/><b>$reg->produtora\n($reg->genero)<b/></td>";
                        // Futura implementação para um usuario editor modificar informações de um jogo
                        echo "<td><a href='configgame.php?cod=$reg->cod'><span class='material-icons'>create</span></a></td></tr>";
                    }
                }
            }
            ?>
        </table>
    </div>
    <?php include_once "footer.php" ?>
</body>

</html>