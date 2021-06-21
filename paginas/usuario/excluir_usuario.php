<h2>Excluir usuário</h2>

<?php

if(isset($_GET["id"])){
    
    $id = $_GET["id"];

    # Delete no banco de dados
    $stmt = $conn->prepare("delete from usuarios where id = :id ");

    $bind_param = ["id" => $id];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro ' . $id . ' deletado do banco!</div>';
        $conn->commit();
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao deletar registro no banco: ' . $e->getMessage() . '</div>';
    }

}

?>

<div id="btn-limpar-sessao">
    <a href="?pg=usuario/usuarios">Voltar</a>
</div>