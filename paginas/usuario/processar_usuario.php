<?php


if(!empty($_POST)){
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $data_hora_criacao = date('Y-m-d H:i:s');


    $stmt = $conn->prepare("INSERT INTO usuarios (nome, usuario, senha, data_hora_criacao) VALUES (:nome, :usuario, :senha, :data_hora_criacao)");

    $bind_param = ["nome" => $nome, "usuario" => $usuario, "senha" => md5($senha), "data_hora_criacao" => $data_hora_criacao];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro ' . $conn->lastInsertId() . ' inserido no banco!</div>';
        $conn->commit();
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao inserir registro no banco: ' . $e->getMessage() . '</div>';
    }

}

?>

<div id="btn-limpar-sessao">
    <a href="?pg=usuario/usuarios">Voltar</a>
</div>