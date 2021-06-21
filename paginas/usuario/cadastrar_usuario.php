<div id="div-form">
    
    <h2>Cadastro de novo usuário</h2>

    <form method="POST" action="?pg=usuario/processar_usuario">
        <div>
            <label>Nome</label>
            <input type="text" name="nome" placeholder="Digite seu nome..." />
        </div>
        <div>
            <label>Usuário</label>
            <input type="text" name="usuario" placeholder="Digite seu usuário..." />
        </div>
        <div>
            <label>Senha</label>
            <input type="senha" name="senha" placeholder="Digite sua senha..." />
        </div>
        <button type="submit">Cadastrar</button>
    </form>
    
<div>