<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/login.js" defer></script>
</head>
<body>

    <?php require 'configu.php'; ?>

    <button id="open-modal">Entrar</button>
    <div id="fade" class="hide"></div>
    <div id="modal" class="hide">
        <div id="modal-header">
            <h1>Faça seu login!</h1>
            <button id="close-modal">x</button>
        </div>
        <div id="modal-body" action="loginBack.php">
            <form method="POST">
                <span class="msg_erro">Tentativa inválida.</span>

                <input type="email" name="email" placeholder="Digite seu Email" required>
                <input class="passw_area" type="password" name="senha" placeholder="Digite sua Senha" required>
                
                <p>Não possui conta? <a href="">Cadastre-se</a><p>

                <button class="btn_login" name="SendLogin">Logar</button>
            </form>
        </div>
        
        
    </div>
    </div>



    
    
</body>
</html>