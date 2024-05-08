<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BabaBaby</title>
    </head>
    <body>
        
        <h1>Login</h1>

        <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            var_dump($dados)
        ?>

        <form method="POST" action="">
            <label>Email:</label>
            <input type="text" name="usuario" placeholder="Digite o email">
            <br><br>
            <label>Senha:</label>
            <input type="password" name="senha_usuario" placeholder="Digite a senha">
            <br><br>
            <input type="submit" value="Acessar" name="SendLogin">
        </form>
    </body>
</html>