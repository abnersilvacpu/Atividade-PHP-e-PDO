<?php

if(!empty($_POST)){   
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
              
        $stmt = $conn->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario");

         $bind_param = ["nome" => $nome, "usuario" => $usuario];
         try {            
             $stmt->execute($bind_param);
             echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro alterado com sucesso!</div>';
         } catch(PDOExecption $e) {
             $conn->rollback();
             echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao alterar registro no banco: ' . $e->getMessage() . '</div>';
         }
    
    }

    ?>

<div id="btn-limpar-sessao">
    <a href="?pg=usuario/usuarios">Voltar</a>
</div>