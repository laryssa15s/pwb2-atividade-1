<?php
    include('conexao.php');
    include('usu.php');
    
    if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: cadastro.html');
        exit();
    }

    $senha = md5($_POST["senha"]);
	$usu = new Usuario($_POST['nome'], $_POST["usuario"], $_POST["email"], $senha);
    
    $nome = $usu->getNome();
    $usuario = $usu->getUsuario();
    $email = $usu->getEmail();
    $senha = $usu->getSenha();
    $i = 0;

    $stmt = $cone->prepare("INSERT INTO `usuario`(`nome`, `usuario`, `email`, `senha`) 
    VALUES (:nome, :usuario, :email, :senha)");

    $fetch = "SELECT `nome`, `usuario` FROM `usuario`";
    $resultado = $cone->query($fetch);

    while($row = $resultado->fetch()) {
        if($row['usuario'] == $usu || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "E-mail ou Usuário já existem.";
    }else{
        $stmt->execute(array(':nome' => $nome, ':usuario' => $usuario, ':email' => $email, ':senha'=> $senha));

        echo "Cadastro efetuado!";
        header("Location: login.html");
    }
?>