//OBTENDO OS ELEMENTOS

const inputImg = document.querySelector("#inputDocBaba");
const spanImg = document.querySelector(".viewImg");
const texto = "Adicioner a Foto do seu documento aqui";
spanImg.innerHTML = texto;

inputImg.addEventListener('change', (event) => {
    const inputTarget = event.target;
    
    const file = inputTarget.files[0];

    if(file) {
        const reader = new FileReader();

        reader.addEventListener('load', (event) => {
            const readerTarget = event.target;
            const img = document.createElement('img');
            spanImg.innerHTML = '';
            img.src = readerTarget.result;
            img.classList.add('viewImg');

            spanImg.appendChild(img);
        });

        reader.readAsDataURL(file);
    } else {
        spanImg.innerHTML = texto;
    }
});
