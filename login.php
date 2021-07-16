<?php
    include('conexao.php');
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit();
    }

    $usuario = mysqli_real_escape_string($cone, $_POST['usuario']);
    $senha = mysqli_real_escape_string($cone, $_POST['senha']);

    $sql = "SELECT usuario, senha FROM usuario WHERE 
    usuario='".$usuario."' and senha='".md5($senha)."'";

    $result = mysqli_query($cone, $sql);

    $contar = mysqli_num_rows($result);

    if($contar == 1) {
        echo "Login concluído";
        header("Location: listar.php");
    }else{
        echo "Dados incorretos";
    }
?>