<?php

$idUsuario = $_SESSION['idUsuario'];

$querySQL = "SELECT u.cpf, u.nome, u.email, u.dtaNascimento, b.tempoExp, b.sobre, u.telefone, u.cidade, u.endereco, b.valor, u.foto, b.estado, (select nome from fxetaria where idFxEtaria = b.fk_idFxEtaria) as fxEtaria FROM baba b INNER JOIN usuario u ON b.pk_idUsuario = u.idUsuario WHERE u.idUsuario = $idUsuario;";
$queryPreparada = $pdo->prepare($querySQL);
$queryPreparada->execute();
$queryPreparada->setFetchMode(PDO::FETCH_ASSOC);
$dadosBaba = $queryPreparada->fetch();
?>
<div class="content-adm">
    <?php
        if ($dadosBaba["estado"] == "0") {
            echo '<div class="view-det-adm">
                        <span class="view-adm-title">PENDENTE DE APROVAÇÃO</span>
                  </div>';
        } else {
            echo '<div class="view-det-adm">
                        <span class="view-adm-title">PERFIL APROVADO</span>
                    </div>';
        }
    ?>
    <div class="view-det-adm">
        <!--PRECISA ARRUMAR A PARTE DE DA FOTO - ESTÁ PEGANDO O PATH DA IMAGEM DO BANCO DE DADOS-->
        <img src="<?=$dadosBaba['foto']?>" width="150" height="150">
    </div>
    <div class="view-det-adm">
        <span class="view-adm-title">CPF: </span>
        <span class="view-adm-info"><?=$dadosBaba['cpf']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Nome: </span>
        <span class="view-adm-info"><?=$dadosBaba['nome']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">E-mail: </span>
        <span class="view-adm-info"><?=$dadosBaba['email']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Data de Nascimento </span>
        <span class="view-adm-info"><?=$dadosBaba['dtaNascimento']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Babá desde: </span>
        <span class="view-adm-info"><?=$dadosBaba['tempoExp']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Sobre: </span>
        <span class="view-adm-info"><?=$dadosBaba['sobre']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Telefone: </span>
        <span class="view-adm-info"><?=$dadosBaba['telefone']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Cidade: </span>
        <span class="view-adm-info"><?=$dadosBaba['cidade']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Endereço: </span>
        <span class="view-adm-info"><?=$dadosBaba['endereco']?></span>
    </div>

    <div class="view-det-adm">
        <span class="view-adm-title">Valor Hora: </span>
        <span class="view-adm-info">R$<?=$dadosBaba['valor']?></span>
    </div>
</div>