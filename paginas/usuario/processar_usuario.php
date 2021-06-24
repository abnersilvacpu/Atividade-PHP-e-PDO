<?php


if(!empty($_POST)){
    
    
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $data_hora_criacao = date('Y-m-d H:i:s');
    $user= $_SESSION["nome"];
    $acao = ("O User: ".$user." cadastrou um novo usuário: ");
    $data_hora_log = date('Y-m-d H:i:s');


    $stmt = $conn->prepare("INSERT INTO usuarios (nome, usuario, senha, data_hora_criacao) VALUES (:nome, :usuario, :senha, :data_hora_criacao)");
    $stmt1 = $conn->prepare("INSERT INTO logs (user, acao, data_hora_log) VALUES (:user, :acao, :data_hora_log)");

    $bind_param = ["nome" => $nome, "usuario" => $usuario, "senha" => md5($senha), "data_hora_criacao" => $data_hora_criacao];
    $bind_param1 = ["user"=> $user, "acao" =>$acao, "data_hora_log"=>$data_hora_log];

    try {
        $conn->beginTransaction();
        $stmt->execute($bind_param);
        $last_id = $conn->lastInsertId();
        $bind_param1['acao'] .= $last_id;
        $stmt1->execute($bind_param1);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro ' . $last_id . ' inserido no banco!</div>';
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