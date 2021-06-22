<h2>Tabela de registro de LOGS</h2>

<?php

$sql = "SELECT * FROM logs";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th style="background-color: rgb(107, 140, 201);">ID:</th>
        <th style="background-color: rgb(107, 140, 201);">User:</th>
        <th style="background-color: rgb(107, 140, 201);">Ação:</th>
        <th style="background-color: rgb(107, 140, 201);">Data_hora</th>
    </tr>
    <?php
        while($linha = $result->fetch()){
    ?>
        <tr>
            <?php 
                foreach($linha as $chave => $valor){
            ?>
                <td><?= $valor ?></td>
                
            <?php
                }
            ?>          
        </tr>
    <?php
        }
    ?>
</table>