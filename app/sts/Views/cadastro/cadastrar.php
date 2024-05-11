<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar.css">
    <title>Cadastro</title>
</head>

<body>
    <?php
    //View da página de cadastro pais
    
    echo "<h1>Cadastre-se</h1>";

    ?>


    <script>
        function validarData() {
            var dataInput = document.getElementById('data').value;
            var dataAtual = new Date().toISOString().slice(0, 10);

            if (dataInput >= dataAtual) {
                alert('Por favor, selecione seu ano real de nascimento.');
                document.getElementById('data').value = '';
            }
        }





    </script>

    <form method="POST" action="">
        <p>Bem-vindo à BabáBaby </p>
        <label><strong>Nome:</strong></label>
        <input name="name" type="text" placeholder="Nome"> <br><br>

        <label><strong>Sobrenome:</strong></label>
        <input name="sobrenome" type="text" placeholder="Sobrenome"> <br><br>

        <label id="dt">
            <strong>Data de Nascimento:</strong><input type="date" id="data " name="dtaNascimento"
                oninput="validarData()" required /> <br><br>
        </label>

        <label id="cpf">
            <strong>CPF:</strong> <input type="text" name="cpf" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}"
                title="Formato: XXX.XXX.XXX-XX" required /> <br><br>
        </label>

        <label>
            <strong>Telefone:</strong> <input type="text" name="telefone" pattern="\d{2}\s?\d{4,5}-?\d{4}"
                title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." required /> <br><br>
        </label>

        <label><strong>Cidade:</strong></label>
        <input name="cidade" type="text" placeholder="Cidade"> <br><br>

        <label><strong>Endereço:</strong></label>
        <input name="endereco" type="text" placeholder="Endereço"> <br><br>

        <label><strong>Email:</strong> <input type="email" name="email" placeholder="Email"
                title="Email entre 10 e 50 letras, deve conter @." required /> <br><br>
        </label>

        <label>
            <strong>Senha: </strong><input type="password" name="senha"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,16}$" required
                title="A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número, um caractere especial e ter entre 8 e 16 caracteres" />
        </label>

        <div>
            <input type="submit" id="btn-pai" value="Sou Pai/Responsável">
            <input type="submit" id="btn-baba" value="Sou Baba">
        </div>

    </form>
    <dialog id="modal-pai">
        <form class="pai" method="POST" action="">
            <fieldset>
                <legend>Dados Adicionais</legend>
                <div>
                    <label for="qnt-crianca">Quantidade de criança(s)</label>
                    <input type="text" placeholder="1" name="qtdeCrianca" pattern="[0-9]+" title="Insira apenas números." required />
                </div>
                <div>
                    <label for="descricao-familia">Fale sobre família</label>
                    <input type="text" placeholder="Somos descontraídos e adoramos jogos" name="descricao" title="Detalhe um pouco sobre como é sua família." required />
                </div>
                <div>
                    <input type="submit" name="cadastrar" value="Cadastrar">
                    <button class="btn-cancelar">Cancelar</button>
                </div>
                </fieldset>
            </form>
    </dialog>
    
    <dialog id="modal-cancelar">
        <div>
            <p>Deseja cancelar? Você perderá as alterações dessa tela.</p>
        </div>
        <div>
            <button id="btn-sim">Sim</button>
            <button id="btn-nao">Não</button>
        </div>
    </dialog>

    <dialog id="modal-baba">
        <form class="baba" method="POST" action="">
            <fieldset>
                <legend>Dados Adicionais</legend>
                <div>
                    <label for="temp-exp">Trabalho como Baba desde </label>
                    <input type="text" name="tempoExp" pattern="[0-9]{4}"
                        title="Por favor, insira um ano válido (quatro dígitos)" placeholder="2005" required />
                </div>
                <div>
                    <label for="referencia">Referência (contato)</label>
                    <input type="text" name="ref" placeholder="(XX) XXXXX-XXXX"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|^\d{10,}$" required
                        title="Por favor, insira um email ou um número de telefone válido para contato (min. 10 dígitos)." />
                </div>
                <div>
                    <label for="sobre">Sobre</label>
                    <input type="text" placeholder="Fale um pouco sobre você" name="sobre"
                        title="Descreva um pouco sobre você e suas experiências." required />
                </div>
                <div>
                    <label for="preferencias-baba">Preferência em cuidade de</label>
                    <select name="fk_idFxEtaria" required>
                        <option value="1">Bebê</option>
                        <option value="2">Criança</option>
                        <option value="3">Infantojuvenil</option>
                        <option value="4">Adolescente</option>
                    </select>
                </div>
                <div>
                    <label for="valor">Valor</label>
                    <input type="text" placeholder="150,00" name="valorH" pattern="\d+(\.\d+)?" required
                        title="Insira um valor em reais (com ponto ao invés de vírgula!)" />
                </div>
                <?php

                //OBTEM DIAS DA SEMANA
                /*$querySQL = "SELECT * FROM dia";
                $queryPreparada = $pdo->prepare($querySQL);
                $queryPreparada->execute();
                $queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
                $dias = $queryPreparada->fetchAll();

                //OBTEM HORARIOS
                $querySQL = "SELECT * FROM turno";
                $queryPreparada = $pdo->prepare($querySQL);
                $queryPreparada->execute();
                $queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
                $turnos = $queryPreparada->fetchAll();
            ?>
            <label>
                <li><strong>Disponibilidade de Dias</strong></li><br>
                <?php foreach($dias as $dia): ?>
                    <div id='<?=$dia['idDia'];?>'>
                        <label for=""><?=$dia['nome'];?></label>
                        <input type="checkbox" name="dia[]" value="<?=$dia['idDia'];?>"/><br>
                    </div>
                <?php endforeach; ?><br>
            <label>
                <li><strong>Disponibilidade de Horário</strong></li><br>
                <?php foreach($turnos as $turno): ?>
                    <div id='<?=$turno['idDia'];?>'>
                        <label for=""><?=$turno['nome'];?></label>
                        <input type="checkbox" name="turno[]" value="<?=$turno['idTurno'];?>" />
                    </div>
                <?php endforeach; ?>
                
            </label>*/
                ?>
                <input name="botao" type="submit" id="button" value="Cadastrar">
                <button class="btn-cancelar">Cancelar</button>
            </fieldset>
        </form>
    </dialog>
    <script src="cadastrar.js"></script>
</body>
</html>