<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
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
    
</body>
</html>
