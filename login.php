<?php
    include('conexao.php');
    include('usu.php');
    
    if(empty($_POST['usuario']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit();
    }

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $cone->prepare("SELECT `usuario`, `senha` FROM `usuario` WHERE `usuario` = :usuario and `senha` = :senha");

    $stmt->bindparam(":usuario", $usuario);
    $stmt->bindValue(":senha", md5($senha));
    $stmt->execute();

    if($stmt->rowCount() == 0){
        echo "Dados incorretos.";
        ?>
            <button><a href="login.html">Voltar</a></button>
        <?php
    }else{
        header("Location: lista.php");
    }
?>