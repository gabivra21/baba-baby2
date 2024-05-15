<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastrar.css">
    <title>Cadastro</title>
</head>

<body>
    <?php
    
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

        function verificarPreenchimento() {
            var formUsuario = document.getElementById('formUsuario');
            var campos = formUsuario.querySelectorAll('input[required], select[required], textarea[required], file[required]');
            var preenchido = true;

            campos.forEach(function (campo) {
                if (!campo.value) {
                    preenchido = false;
                }
            });

            if (preenchido) {
                document.getElementById('btn-pai').disabled = false;
                document.getElementById('btn-baba').disabled = false;
            } else {
                document.getElementById('btn-pai').disabled = true;
                document.getElementById('btn-baba').disabled = true;
            }
        }

        window.onload = function () {
            verificarPreenchimento();
        };






    </script>

    <form  id="formUsuario" oninput="verificarPreenchimento()" enctype="multipart/form-data">
        <p>Bem-vindo à BabáBaby </p>
        <label><strong>Nome:</strong></label>
        <input name="name" id="name" type="text" placeholder="Nome"> <br><br>

        <label><strong>Sobrenome:</strong></label>
        <input name="sobrenome" id="sobrenome" type="text" placeholder="Sobrenome"> <br><br>

        <label id="dt">
            <strong>Data de Nascimento:</strong><input type="date" id="data" name="dtaNascimento"
                oninput="validarData()" required /> <br><br>
        </label>

        <label >
            <strong>CPF:</strong> <input type="text" id="cpf" name="cpf" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}"
                title="Formato: XXX.XXX.XXX-XX" required /> <br><br>
        </label>

        <label>
            <strong>Telefone:</strong> <input type="text" id="tel" name="telefone" pattern="\d{2}\s?\d{4,5}-?\d{4}"
                title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX." required /> <br><br>
        </label>

        <label><strong>Cidade:</strong></label>
        <input name="cidade" id="cidade" type="text" placeholder="Cidade"> <br><br>

        <label><strong>Endereço:</strong></label>
        <input name="endereco" id="endereco" type="text" placeholder="Endereço"> <br><br>

        <label><strong>Foto:</strong></label>
        <input name="foto" id="foto" type="file" required> <br><br>

        <label><strong>Email:</strong> <input id="email" type="email" name="email" placeholder="Email"
                title="Email entre 10 e 50 letras, deve conter @." required /> <br><br>
        </label>

        <label>
            <strong>Senha: </strong><input type="password" id="senha" name="senha"
                pattern="^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[^\da-zA-Z]).{8,16}$" required
                title="A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número, um caractere especial e ter entre 8 e 16 caracteres" />
        </label>

        <div>
            <input type="button" class="modalForm" id="btn-pai" value="Sou Pai/Responsável"/>
            <input type="button" class="modalForm" id="btn-baba" value="Sou Baba"/>
        </div>

    </form>
    <dialog id="modal-pai">
        <form class="pai" method="POST" action="backend/cadastroPai.php">
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
                <?php require "componente/diasSemana.php"; ?>
                <?php require "componente/horarios.php"; ?>
                <input name="botao" type="submit" id="button" value="Cadastrar">
                <button class="btn-cancelar">Cancelar</button>
            </fieldset>
        </form>
    </dialog>
    <script src="../../js/jquery.js"></script>
    <script src="js/cadastrar.js"></script>
</body>
</html>