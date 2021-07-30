<?php
    include('conexao.php');

    if(empty($_POST['pesquisa'])){
        header('Location: lista.php');
        exit();
    }

    $pesquisa = $_POST['pesquisa'];

    $stmt = $cone->prepare("SELECT `nome` FROM `usuario` WHERE `nome` = :pes");

    $stmt->bindparam(":pes", $pesquisa);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        echo "Usuário não foi encontrado.<br>";
    }else{
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Nome de usuário: <br>";
        foreach ($resultado as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
    
    ?>
    <?php
?>