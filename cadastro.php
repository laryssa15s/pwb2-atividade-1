<?php
    include('conexao.php');
    if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: cadastro.html');
        exit();
    }

    $nome = mysqli_real_escape_string($cone, $_POST['nome']);
    $usuario = mysqli_real_escape_string($cone, $_POST['usuario']);
    $email = mysqli_real_escape_string($cone, $_POST['email']);
    $senha = mysqli_real_escape_string($cone, $_POST['senha']);

$sql = "INSERT INTO `usuario`(`nome`, `usuario`, `email`, `senha`) 
    VALUES('".$nome."','".$usuario."','".$email."','".md5($senha)."')";

    if ($cone->query($sql) === TRUE) {
        echo "Cadastro realizado";
    } else {
    echo "Ocorreu um erro: " . $sql . "<br>" . $cone->error;
    }

    $cone->close();
?>

