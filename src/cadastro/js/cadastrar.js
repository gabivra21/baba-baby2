
//COMPONENTES

const btnSouPai = document.getElementById("btn-pai");
const btnSouBaba = document.getElementById("btn-baba");
const btnCancelar = document.getElementsByClassName("btn-cancelar");
const btnSim = document.getElementById("btn-sim");
const btnNao = document.getElementById("btn-nao");
const modalSouPai = document.getElementById("modal-pai");
const modalSouBaba = document.getElementById("modal-baba");
const modalCancelar = document.getElementById("modal-cancelar");
const btnModais = document.getElementsByClassName("modalForm");

//FUNÇÕES

btnSouPai.onclick = () => {
    modalSouPai.showModal();
}

btnSouBaba.onclick = () => {
    modalSouBaba.showModal();
}

for (var i = 0; i < btnCancelar.length; i++) {
    btnCancelar[i].addEventListener('click', () => {
        modalCancelar.showModal();
    })
}

btnSim.onclick = () => {
    modalCancelar.close();
    document.querySelector("dialog[open]").close();
}

btnNao.onclick = () => {
    modalCancelar.close();
}

$(document).ready(() => {
    for (var i = 0; i < btnModais.length; i++) {
        console.log("ESTOU AQUI")
        btnModais[i].addEventListener('click', () => {
            var form = new FormData($("#formUsuario")[0]);
            $.ajax({
                url: "backend/cadastrarUsuario.php",
                type: "post",
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                data: form,
                timeout: 8000,
                success: (result) => {
                   console.log(form.values())
                }
            });
        });
    }
});