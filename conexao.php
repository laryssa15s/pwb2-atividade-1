<?php
$nomehost = "localhost";
$banco = "AVA1";
$usuario = "root";
$senha = "";

$cone = new mysqli($nomehost, $usuario,$senha, $banco);

if($cone->connect_error){
  die("Erro na conexão ". $cone->connect_error);
}
?>
