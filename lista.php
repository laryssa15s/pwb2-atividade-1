<?php
    include('conexao.php');

    ?>
        <form method="POST" name="form" action="pesquisa.php">
            <br>
            <label for="pesquisa">Buscar por usuário: </label>
            <input type="text" name="pesquisa">
            <br>
            <button type="submit">Pesquisar</button>
            <br>
        </form>
    <?php

    $stmt = $cone->prepare("SELECT `nome` FROM `usuario`");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($resultado); $i++) { 
        echo "Nome do usuário: ".($i+1)."<br>";
        foreach ($resultado[$i] as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
?>