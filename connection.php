<?php
$usuario = 'admin';
$senha = 'Iurd2016';
$database = 'pedalaTeste';
$host = 'database-mysql-pedala.cxi0g2gue0k4.us-east-1.rds.amazonaws.com:3306';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("Falha ao conectar ao serviço RDS da AWS: ".$mysqli->error);
}else{
    echo 'Conectado com sucesso!';
}

?>