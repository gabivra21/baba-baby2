<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="entrar.css">
</head>
<body>
    <div class="box_login">
        <h1>Faça seu login!</h1>

        <form method="POST" action="login/check">
            <span class="msg_erro">Tentativa inválida.</span>

            <input type="email" name="email" placeholder="Digite seu Email">
            <input class="passw_area" type="password" name="senha" placeholder="Digite sua Senha">
            
            <p>Não possui conta? <a href="">Cadastre-se</a><p>

            <button class="btn_login">Entrar</button>
        </form>
    </div>
    
</body>
</html>