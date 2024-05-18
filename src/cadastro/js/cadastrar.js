document.addEventListener('DOMContentLoaded', () => {
    const userTypeRadios = document.querySelectorAll('input[name="userType"]');
    const formPai = document.getElementById('formPai');
    const formBaba = document.getElementById('formBaba');

    userTypeRadios.forEach(radio => {
        radio.addEventListener('change', (event) => {
            switch (event.target.value) {
                case 'pai':
                    formPai.classList.remove('hidden');
                    formBaba.classList.add('hidden');
                    formPai.querySelectorAll('input').forEach(input => input.required = true);
                    formBaba.querySelectorAll('input').forEach(input => input.required = false);
                    break;
                case 'baba':
                    formPai.classList.add('hidden');
                    formBaba.classList.remove('hidden');
                    formBaba.querySelectorAll('input').forEach(
                        input => input.type == 'checkbox' ? input.required = false : input.required = true
                    );
                    formPai.querySelectorAll('input').forEach(input => input.required = false);
                    break;
                default:
                    formPai.classList.add('hidden');
                    formBaba.classList.add('hidden');
                    formBaba.querySelectorAll('input').forEach(input => input.required = true);
                    formPai.querySelectorAll('input').forEach(input => input.required = true);
                    break;
            }
        });
    });

    // Trigger the change event on the checked radio button to set the initial state
    const checkedRadio = document.querySelector('input[name="userType"]:checked');
    if (checkedRadio) {
        checkedRadio.dispatchEvent(new Event('change'));
    }
});