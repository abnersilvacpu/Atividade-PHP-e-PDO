<h2>Excluir usuário</h2>

<?php

if(isset($_GET["id"])){
    
    $id = $_GET["id"];
    $user= $_SESSION["nome"];
    $acao = ("O ID: ".$id. " foi excluído");
    $data_hora_log = date('Y-m-d H:i:s');   

    # Delete no banco de dados
    $stmt = $conn->prepare("delete from usuarios where id = :id ");
    $stmt1 = $conn->prepare("INSERT INTO logs (user, acao, data_hora_log) VALUES (:user, :acao, :data_hora_log)");

    $bind_param = ["id" => $id];
    $bind_param1 = ["user"=> $user, "acao" =>$acao, "data_hora_log"=>$data_hora_log];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        $stmt1->execute($bind_param1);
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