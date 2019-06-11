<?php
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=projeto_burials;charset=utf8',
        'root', '');
}catch(PDOException $e){
    echo "Erro: ", $e->getMessage();
}
?>
