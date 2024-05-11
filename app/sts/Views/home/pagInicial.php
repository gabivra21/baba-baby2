<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BabaBaby</title>
        <link rel="stylesheet" href="assets\css\login.css">
    </head>
    <body>
        
    <div class="box_login">
            <h1>Faça seu login!</h1>

            <form>
                <span class="msg_erro">Tentativa inválida.</span>
                <input type="email" name="email" placeholder="Digite seu email">
                <input class="passw_area" type="password" name="password" placeholder="Digite sua senha">
                <p>Não possui cadastro? <a href="Cadastro.php">Cadastre-se</a></p>
                <button class="btn_login">ENTRAR</button>
                
            </form>
        </div>


        <?php
            //$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            //var_dump($dados)
        ?>
    </body>
</html>