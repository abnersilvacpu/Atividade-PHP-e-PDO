<?php

if(isset($_SESSION["nome"])){
    header("Location: ?pg=area_restrita");
}

?>

<div id="div-form">
    
    <h1>Login</h1>

    <form method="POST" action="?pg=login/processar_formulario">
        <div>
            <label>Usuário</label>
            <input type="text" name="usuario" required placeholder="Digite seu usuário..." />
        </div>
        <div>
            <label>Senha</label>
            <input type="password" name="senha" required placeholder="Digite sua senha..." />
        </div>
        <button type="submit">Enviar</button>
    </form>
    
<div>