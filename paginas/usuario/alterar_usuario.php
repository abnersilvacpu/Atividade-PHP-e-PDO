<?php
    $id = $_GET["id"];

    if(!empty($_POST)){   
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $data_hora_atualizacao = date('Y-m-d H:i:s');
    $user= $_SESSION["nome"];
    $acao = ("Alteração do usuário referente ao ID: ".$id);
    $data_hora_log = date('Y-m-d H:i:s');    
    
    
    $stmt = $conn->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, data_hora_atualizacao = :data_hora_atualizacao where id = :id");
    $stmt1 = $conn->prepare("INSERT INTO logs (user, acao, data_hora_log) VALUES (:user, :acao, :data_hora_log)");

    $bind_param = ["nome" => $nome, "usuario" => $usuario,"data_hora_atualizacao" => $data_hora_atualizacao, "id" => $id];
    $bind_param1 = ["user"=> $user, "acao" =>$acao, "data_hora_log"=>$data_hora_log];

    try {            
        $stmt->execute($bind_param);
        $stmt1->execute($bind_param1);
        echo '<div class="msg-cadastro-contato msg-cadastro-sucesso">Registro alterado com sucesso!</div>';
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<div class="msg-cadastro-contato msg-cadastro-erro">Erro ao alterar registro no banco: ' . $e->getMessage() . '</div>';
    }

}

$sql = "SELECT id, nome, usuario FROM usuarios WHERE id =". $id;    
$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

    <?php 
        while($sql = $result->fetch()){                
    ?>


<div id="div-form">
    
    <h2>Alteração de novo usuário</h2>

    <form method="POST">   
        <div>
            <label>Nome</label>
            <input type="text" name="nome" value="<?=$sql['nome']?>" placeholder="Digite seu nome..." />
        </div>
        <div>
            <label>Usuário</label>
            <input type="text" name="usuario" value="<?=$sql['usuario']?>" placeholder="Digite seu usuário..." />
        </div>
         <input type="hidden" name="id" value="<?=$sql['id']?>">

        <button type="submit">Alterar</button>
    </form>
    
    <?php
        }
    ?>    
<div>