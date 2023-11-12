document.getElementById('togglePassword').addEventListener('click',function(){
    var passwordInput = document.getElementById('senha_input');
    var togglePasswordImage = document.getElementById('togglePassword');

    if(passwordInput.type === 'password'){
        passwordInput.type = 'text';
        togglePasswordImage.src = '/ProjetoTCC/imagens/eye-slash.svg';
    }else {
        passwordInput.type = 'password';
        togglePasswordImage.src = '/ProjetoTCC/imagens/eye.svg';
    }

})