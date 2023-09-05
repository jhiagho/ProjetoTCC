const form = document.querySelector("#form")
const name_Input = document.querySelector("#primeiro_nome")
const lastname_Input = document.querySelector("#sobre_nome")
const email_Input = document.querySelector("#email")
const telefone_Input = document.querySelector("#telefone")
const user_Input = document.querySelector("#user")
const password_Input = document.querySelector("#password")
const conf_password_Input = document.querySelector("#confirmpassword")

form.addEventListener("submit", (event) => {
    //const verfica = true;
    verificarErro = false;

    document.getElementById("primeiro_nome_Error").textContent = '';
    document.getElementById("sobre_nome_Error").textContent = '';
    document.getElementById("telefone_Error").textContent = '';
    document.getElementById("email_Error").textContent = '';
    document.getElementById("password_Error").textContent = '';
    document.getElementById("confirmpassword_Error").textContent = '';

    //console.log(email_Input.value);
    //verifica se o nome esta vazio
    if (name_Input.value == "" || !isNomeValid(name_Input.value)) {
        document.getElementById("primeiro_nome_Error").textContent = 'Preencha o campo de nome corretamente';
        verificarErro = true;
    }
    

    if (lastname_Input.value == "" || !isNomeValid(lastname_Input.value)){
        document.getElementById("sobre_nome_Error" ).textContent = 'Preencha o campo de sobrenome corretamente';
        verificarErro = true;
    }
    if (telefone_Input.value == "" ){
        document.getElementById("telefone_Error").textContent = 'Preencha o campo do telefone';
        verificarErro = true;
    }
    if(email_Input.value == "" || !isEmailValid(email_Input.value)) {
        document.getElementById("email_Error").textContent = 'Preencha o email corretamente';
        verificarErro = true;
        //verfica = false;
    }

    if(!validarPassword(password_Input.value,8)){
        document.getElementById("password_Error").textContent = 'o tamanho minimo da senha tem ser 8';
        verificarErro = true;
        //verfica = false;
    }

    if(password_Input.value != conf_password_Input.value){
        document.getElementById("confirmpassword_Error").textContent = 'As senhas não conferem';
        verificarErro = true;
        //verfica = false;
    }

    user_Input.addEventListener('blur', function() {
    const username = user_Input.value;

    $.post('/ProjetoTCC/api/verificar_user.php', { user: username }).done(function(response) {
        const { exists } = JSON.parse(response);
        if (exists) {
            document.getElementById("user_Error").textContent = 'Este nome de usuário já está em uso.';
            verificarErro = true;
            // Adicione uma variável global ou outro indicador para lembrar que o nome de usuário não é válido
        } else {
            document.getElementById("user_Error").textContent = ''; // Limpa a mensagem de erro
        }
    }, 'json');
});


    if (verificarErro) {
        event.preventDefault();
    }

});

function isEmailValid(email_Input) {
    //criar uma regex para validar email
    const emailRegex = new RegExp(
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    );
    if(emailRegex.test(email_Input)) {
        return true;
    }
    return false;
}

function isNomeValid(nome_Input) {
    //criar um regex para validar nome.
    const nomeRegex = new RegExp(
        /^[a-zA-Z]+$/
    );
    if(nomeRegex.test(nome_Input)) {
        return true;
    }
    return false;
}

function validarPassword(password, minDigits){
    if(password.length >= minDigits) {
        return true;
    }
    return false;
}

$(function(){
    $('#telefone').mask('(00)00000-0000');
})


   

