<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Página Principal</title>
</head>
<body>
    <?php require_once("conecta.php"); ?>
    <center>
        <form class="" action="index.php" method="post">
            <label>Buscar por:</label>
            <select id="opcoes" name="opcoes">
                <option value="0" selected>Escolha</option>
                <option value="1">Todas as predições de acordo com um conjunto de parâmetros</option>
                <option value="2">Acurácia média por tamanho da janela</option>
                <option value="3">Acurácia média por número de camadas</option>
                <input type="submit" name="escolher" value="escolha">
            </select><br><br>
        </form>
        <?php

        $camadas = '<label>Número de camadas</label><br>
        <input type="number" min="2" max="5"name="numero-camadas" value=""><br><br>';

        $classe_camadas = '<label>Classe de tamanho</label><br>
        <input type="radio" name="classe-camada" value="0">Todas
        <input type="radio" name="classe-camada" value="80">Até 80
        <input type="radio" name="classe-camada" value="50_100">Entre 50 e 100
        <input type="radio" name="classe-camada" value="120">Até 120
        <input type="radio" name="classe-camada" value="160">Até 160
        <input type="radio" name="classe-camada" value="240">Até 240
        <input type="radio" name="classe-camada" value="1000">Até 1000
        <br><br>';

        $janela = '<label>Tamanho da Janela</label><br>
        <input type="number" min="1" max="5" name="tamanho-janela" value=""><br><br>';

        if (!isset($_POST['opcoes'])) {
            echo "Selecione uma opção acima";
        }else{
            if ($_POST['opcoes']==1) {
                echo '<form action="processa.php" method="POST">';
                echo $camadas;
                echo $classe_camadas;
                echo $janela;
                echo '<input type="submit" name="enviar" value="Buscar"></form>';
            }
            if ($_POST['opcoes']==2) {
                echo '<form action="processa.php" method="POST">';
                echo $camadas;
                echo $classe_camadas;
                echo '<input type="submit" name="enviar" value="Buscar"></form>';
            }
            if ($_POST['opcoes']==3) {
                echo '<form action="processa.php" method="POST">';
                echo $classe_camadas;
                echo $janela;
                echo '<input type="submit" name="enviar" value="Buscar"></form>';
            }
        }

        ?>
    </center>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
