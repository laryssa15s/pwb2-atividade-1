<?php
    include('conexao.php');
    $sql = "SELECT nome FROM usuario";
    $resultado = $cone->query($sql);

    echo 'Nomes cadastrados com sucesso';
    echo '<br/>';
    echo '<br/>';

    while($row = $resultado->fetch_array()) {
        echo $row['nome'];
        echo '<br/>';
        echo '<br/>';
    }
?>