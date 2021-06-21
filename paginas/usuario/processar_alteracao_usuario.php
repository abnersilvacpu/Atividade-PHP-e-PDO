<?php

if(!empty($_POST)){   
        
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
       
        $stmt = $conn->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario,  senha = :senha)");

        $bind_param = ["nome" => $nome, "usuario" => $usuario, "senha" => md5($senha)];
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