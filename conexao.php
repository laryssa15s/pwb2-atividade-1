<?php
  try {
    $usuario = "root";
    $senha = "";

    $cone = new PDO('mysql:host=localhost;dbname=AVA2', $usuario, $senha);
    $cone->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $c) {
    echo 'Ocorreu uma erro e a conexão não foi efetuada ' . $c->getMessage();
  }
?>
