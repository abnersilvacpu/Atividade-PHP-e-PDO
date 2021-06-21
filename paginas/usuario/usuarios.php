<?php

$sql = "SELECT id, nome, usuario, data_hora_criacao, data_hora_atualizacao FROM usuarios";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>
<div class="menu-usuarios">
    <ul style="margin: 0 auto; padding-left: 45%;">
        <a href="?pg=usuario/cadastrar_usuario"><li>Cadastrar novo usuário</li></a>
    </ul>
</div>

<h2>Cadastro de usuários</h2>

<table>
    <tr>
        <th style="background-color: rgb(107, 140, 201);">ID</th>
        <th style="background-color: rgb(107, 140, 201);">Nome</th>
        <th style="background-color: rgb(107, 140, 201);">Usuário</th>
        <th style="background-color: rgb(107, 140, 201);">Data criação</th>
        <th style="background-color: rgb(107, 140, 201);">Data alteração</th>
        <th style="background-color: #6ebd6b;">Alterar</th>
        <th style='background-color: #df6969;'>Excluir</th>
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
            <td style="background-color: #6ebd6b;">
            <a  href="?pg=usuario/alterar_usuario&id=<?= $linha['id'] ?>">Alterar</a>
            </td>
            <td style='background-color: #df6969;'>
            <a href="?pg=usuario/excluir_usuario&id=<?= $linha['id'] ?>">Excluir</a>
            </td>            
        </tr>
    <?php
        }
    ?>
</table>

