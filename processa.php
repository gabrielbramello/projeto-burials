<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Processa</title>
</head>
<body>
<?php

require_once("conecta.php");

########## Pesquisa no BD ####################

if(isset($_POST['numero-camadas']) and isset($_POST['classe-camada']) and isset($_POST['tamanho-janela'])){

	$numero = $_POST['numero-camadas'];
	$classe = $_POST['classe-camada'];
	$tamanho= $_POST['tamanho-janela'];

	$totalRegistros = pesquisaDB($numero, $classe, $tamanho);
    $contRegistrosLinha = 0;


    foreach($totalRegistros as $key => $registro) {
        $contRegistrosLinha++;
        foreach ($registro as $key2 => $value2) {
            if ($key2 == 'pdb') {
                $pdb = $value2;
            }
            if ($key2 == 'sequence') {
                $sequence = $value2;
            }
            if ($key2 == 'burials') {
                $burials = $value2;
            }
            if ($key2 == 'prediction') {
                $prediction = $value2;
            }
            if ($key2 == 'accuracy') {
                $accuracy = $value2;
            }
        }
        if($contRegistrosLinha==1){
?>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nome da proteina: <?php echo $pdb;?></h5>
                        <p class="card-text">Sequencia: <?php echo substr($sequence, 0, 10);?></p>
                        <p class="card-text">Burials: <?php echo substr($burials, 0, 10);?></p>
                        <p class="card-text">Predição: <?php echo substr($prediction, 0, 10);?></p>
                        <p class="card-text">Acurácia: <?php echo substr($accuracy, 0, 4);?></p>
                        <a href="#proteina1" class="btn btn-primary">Expandir</a>
                    </div>
                </div>
            </div>
<?php
        }else if($contRegistrosLinha>1 && $contRegistrosLinha<=3){
?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nome da proteina: <?php echo $pdb;?></h5>
                        <p class="card-text">Sequencia: <?php echo substr($sequence, 0, 10);?></p>
                        <p class="card-text">Burials: <?php echo substr($burials, 0, 10);?></p>
                        <p class="card-text">Predição: <?php echo substr($prediction, 0, 10);?></p>
                        <p class="card-text">Acurácia: <?php echo substr($accuracy, 0, 4);?></p>
                        <a href="#proteina1" class="btn btn-primary">Expandir</a>
                    </div>
                </div>
            </div>
<?php
        }else if($contRegistrosLinha==4){
?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nome da proteina: <?php echo $pdb;?></h5>
                        <p class="card-text">Sequencia: <?php echo substr($sequence, 0, 10);?></p>
                        <p class="card-text">Burials: <?php echo substr($burials, 0, 10);?></p>
                        <p class="card-text">Predição: <?php echo substr($prediction, 0, 10);?></p>
                        <p class="card-text">Acurácia: <?php echo substr($accuracy, 0, 4);?></p>
                        <a href="#proteina1" class="btn btn-primary">Expandir</a>
                    </div>
                </div>
            </div>
        </div>
<?php
            $contRegistrosLinha = 0;
        }
    }


}else if(!(isset($_POST["tamanho-janela"])) and isset($_POST['numero-camadas']) and isset($_POST['classe-camada'])){

	$numero = $_POST['numero-camadas'];
	$classe = $_POST['classe-camada'];

	$totalRegistros = pesquisaDB2($numero, $classe);
    $contRegistrosLinha = 0;
    foreach($totalRegistros as $key => $registro) {
        $contRegistrosLinha++;
        foreach ($registro as $key2 => $value2) {
            if ($key2 == 'windowsize') {
                $windowsize = $value2;
            }
            if ($key2 == 'avgacc') {
                $avgacc = $value2;
            }
        }
        if($contRegistrosLinha==1){
        ?>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Windows Size: <?php echo $windowsize;?></p>
                        <p class="card-text">Avgacc: <?php echo $avgacc;?></p>
                    </div>
                </div>
            </div>
        <?php
        }else if($contRegistrosLinha>1 && $contRegistrosLinha<=3){
        ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Windows Size: <?php echo $windowsize;?></p>
                        <p class="card-text">Avgacc: <?php echo $avgacc;?></p>
                    </div>
                </div>
            </div>
        <?php
        }else if($contRegistrosLinha==4){
        ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Windows Size: <?php echo $windowsize;?></p>
                        <p class="card-text">Avgacc: <?php echo $avgacc;?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $contRegistrosLinha = 0;
        }
    }



}else if(!(isset($_POST["numero-camadas"])) and isset($_POST['tamanho-janela']) and isset($_POST['classe-camada'])){

	$tamanho= $_POST['tamanho-janela'];
	$classe = $_POST['classe-camada'];

	$totalRegistros = pesquisaDB3($tamanho, $classe);

    $contRegistrosLinha = 0;


    foreach($totalRegistros as $key => $registro) {
        $contRegistrosLinha++;
        foreach ($registro as $key2 => $value2) {
            if ($key2 == 'nlayers') {
                $nlayers = $value2;
            }
            if ($key2 == 'avgacc') {
                $avgacc = $value2;
            }
        }
        if($contRegistrosLinha==1){
?>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Número de camadas: <?php echo $nlayers;?></p>
                            <p class="card-text">Avgacc: <?php echo $avgacc;?></p>
                        </div>
                    </div>
                </div>
<?php
        }else if($contRegistrosLinha>1 && $contRegistrosLinha<=3){
?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Número de camadas: <?php echo $nlayers;?></p>
                        <p class="card-text">Avgacc: <?php echo $avgacc;?></p>
                    </div>
                </div>
            </div>
<?php
        }else if($contRegistrosLinha==4){
?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Número de camadas: <?php echo $nlayers;?></p>
                        <p class="card-text">Avgacc: <?php echo $avgacc;?></p>
                    </div>
                </div>
            </div>
        </div>
<?php
            $contRegistrosLinha = 0;
        }
    }




}



##############################################






function pesquisaDB(string $numero, string $classe, string $tamanho){

		global $pdo;
		$query1 = $pdo->prepare('SELECT p.pdb, ch.sequence, ch.burials, p.burials AS prediction, p.accuracy
					FROM prediction AS p
					JOIN configuration AS cf ON p.configuration = cf.id
					JOIN dataset as ds ON cf.dataset = ds.id
					JOIN chain as ch ON p.pdb = ch.pdb
					WHERE ch.dataset = ds.id
					AND ds.nlayers= ?
					AND ds.size= ?
					AND cf.windowsize= ?');

		$resultado = $query1->execute(array($numero, $classe, $tamanho));

		$nlinhas = $query1->rowCount();
		$ncampos = $query1->columnCount();

		echo "<p>A tabela retornada tem $ncampos campos e $nlinhas linhas.</p>\n";
        $contador = 0;
		while($linha = $query1->fetch(PDO::FETCH_OBJ)){
            $registro = array(
                'pdb' => $linha->pdb,
                'sequence' => $linha->sequence,
                'burials' => $linha->burials,
                'prediction' => $linha->prediction,
                'accuracy' => $linha->accuracy
            );
            $totalRegistros[$contador] = $registro;
            $contador++;
        }

        return $totalRegistros;
}

function pesquisaDB2(string $numero, string $classe){

		global $pdo;
		$query2 =$pdo->prepare('SELECT cf.windowsize, AVG(p.accuracy) AS avgacc
					FROM prediction AS p
					JOIN configuration AS cf ON p.configuration = cf.id
					JOIN dataset as ds ON cf.dataset = ds.id
					JOIN chain as ch ON p.pdb = ch.pdb
					WHERE ch.dataset = ds.id
					AND ds.nlayers=?
					AND ds.size=?
					GROUP BY (cf.windowsize)') ;

		$resultado = $query2->execute(array($numero, $classe));

		$nlinhas = $query2->rowCount();
		$ncampos = $query2->columnCount();

		echo "<p>A tabela retornada tem $ncampos campos e $nlinhas linhas.</p>\n";
        $contador = 0;
		while($linha = $query2->fetch(PDO::FETCH_OBJ)){
            $registro = array(
                'windowsize' => $linha->windowsize,
                'avgacc' => $linha->avgacc,
            );
            $totalRegistros[$contador] = $registro;
            $contador++;
        }

        return $totalRegistros;
}


function pesquisaDB3(string $tamanho, string $classe){

		global $pdo;
		$query3 = $pdo->prepare('SELECT ds.nlayers, AVG(p.accuracy) AS avgacc
					FROM prediction AS p
					JOIN configuration AS cf ON p.configuration = cf.id
					JOIN dataset as ds ON cf.dataset = ds.id
					JOIN chain as ch ON p.pdb = ch.pdb
					WHERE ch.dataset = ds.id
					AND cf.windowsize = ?
					AND ds.size = ?
					GROUP BY (ds.nlayers)');


		$resultado = $query3->execute(array($tamanho, $classe));

		$nlinhas = $query3->rowCount();
		$ncampos = $query3->columnCount();

		echo "<p>A tabela retornada tem $ncampos campos e $nlinhas linhas.</p>\n";

        $contador = 0;
		while($linha = $query3->fetch(PDO::FETCH_OBJ)){
            $registro = array(
                'nlayers' => $linha->nlayers,
                'avgacc' => $linha->avgacc,
            );
            $totalRegistros[$contador] = $registro;
            $contador++;
        }

        return $totalRegistros;

}
?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
