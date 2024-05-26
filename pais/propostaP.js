document.addEventListener("DOMContentLoaded", function() {
    const openModalButtons = document.querySelectorAll(".open-modal");
    const closeModalButtons = document.querySelectorAll(".close-modal");
    const fades = document.querySelectorAll(".fade");
    const modals = document.querySelectorAll(".modal");
    const finalizarButtons = document.querySelectorAll(".botao-finalizar");

    // Função para abrir modal
    openModalButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            modals[index].classList.remove("hide");
            fades[index].classList.remove("hide");
        });
    });

    // Função para fechar modal
    closeModalButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            modals[index].classList.add("hide");
            fades[index].classList.add("hide");
        });
    });

    // Função para fechar modal ao clicar fora
    fades.forEach((fade, index) => {
        fade.addEventListener("click", () => {
            modals[index].classList.add("hide");
            fade.classList.add("hide");
        });
    });

    // Função para finalizar proposta
    document.querySelectorAll('.botao-finalizar').forEach(button => {
        button.addEventListener('click', function() {
            const propostaId = this.getAttribute('data-proposta-id');
            if (confirm('Tem certeza de que deseja finalizar esta proposta?')) {
                finalizeProposta(propostaId, this);
            }
        });
    });

    function finalizeProposta(propostaId, button) {
        // Cria uma requisição AJAX para atualizar o estado da proposta no servidor
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'finalizar_proposta.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Esconde a linha da tabela
                    const row = button.closest('tr');
                    row.style.display = 'none';
                } else {
                    alert('Erro ao finalizar proposta: ' + response.message);
                }
            }
        };
        xhr.send('idProposta=' + encodeURIComponent(propostaId));
    }
})