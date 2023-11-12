const form = document.querySelector("#form")
const name_Input = document.querySelector("#primeiro_nome")
const lastname_Input = document.querySelector("#sobre_nome")
const email_Input = document.querySelector("#email")
const telefone_Input = document.querySelector("#telefone")
const user_Input = document.querySelector("#user")
const password_Input = document.querySelector("#password")
const conf_password_Input = document.querySelector("#confirmpassword")

const formSenha = document.querySelector("#form_senha");
const passwordInput3 = document.getElementById('antiga_password');
const passwordInput4 = document.getElementById('password_alterar');
const conf_password_Input2 = document.getElementById('confirmpassword_alterar');

document.addEventListener("DOMContentLoaded", function() {

    if(formSenha){
        formSenha.addEventListener("submit", (e) => {
    
            let verificarErro = false;
            document.getElementById("password_alterar_Error").textContent = '';
            document.getElementById("confirmpassword_alterar_Error").textContent = '';
            
            if(!validarPassword(passwordInput4.value,8)){
                console.log('Entrei no validarPassword');
                document.getElementById("password_alterar_Error").textContent = 'o tamanho minimo da senha tem que ser 8';
                verificarErro = true;
                //verfica = false;
            }
        
            if(passwordInput4.value != conf_password_Input2.value){
                console.log('Entrei no Confirir o Password');
                document.getElementById("confirmpassword_alterar_Error").textContent = 'As senhas não conferem!';
                verificarErro = true;
                //verfica = false;
            }
           
            if (verificarErro) {
                e.preventDefault();
            }
        })
    }

    form.addEventListener("submit", (event) => {
        //const verfica = true;
        nameIsvalid = true;
    
        // document.getElementById("primeiro_nome_Error").textContent = '';
        // document.getElementById("sobre_nome_Error").textContent = '';
        document.getElementById("telefone_Error").textContent = '';
        document.getElementById("email_Error").textContent = '';
        document.getElementById("password_Error").textContent = '';
        document.getElementById("confirmpassword_Error").textContent = '';
    
        //console.log(email_Input.value);
        //verifica se o nome esta vazio   
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
       
        if (verificarErro) {
            event.preventDefault();
        }
    
    });

    user_Input.addEventListener('blur', function() {
        const username = user_Input.value;
    
        $.post('/ProjetoTCC/api/verificar_user.php', { user: username }).done(function(response) {
            const { exists } = JSON.parse(response);
            if (exists) {
                document.getElementById("user_Error").textContent = 'Este nome de usuário já está em uso ou campo está vazio.';
                verificarErro = true;
                // Adicione uma variável global ou outro indicador para lembrar que o nome de usuário não é válido
            } else {
                document.getElementById("user_Error").textContent = ''; // Limpa a mensagem de erro
            }
        }, 'json');
    });

    name_Input.addEventListener('blur', function() {

        if (name_Input.value == "" || !isNomeValid(name_Input.value)) {
            document.getElementById("primeiro_nome_Error").textContent = 'Preencha o campo de nome corretamente';
            // verificarErro = true;
            nameIsvalid = false;
        } else {
            document.getElementById("primeiro_nome_Error").textContent = '';
            nameIsvalid = true;
        }

        
    });

    lastname_Input.addEventListener('blur', function(){
        if (lastname_Input.value == "" || !isNomeValid(lastname_Input.value)){
            document.getElementById("sobre_nome_Error" ).textContent = 'Preencha o campo de sobrenome corretamente';
            // verificarErro = true;
        } else {
            document.getElementById("sobre_nome_Error").textContent = '';
            if (nameIsvalid && user_Input.value == ""){
                user_Input.value = name_Input.value + '.' + lastname_Input.value;
            }
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
    
        $('.select_2').select2();
    
        $(document).ready(function() {
            // Inicializa o select2
            $('.js-example-basic-single').select2();
        
            // Estiliza o contorno e o fundo da caixa de seleção
            $('.select2-container--default .select2-selection--single').css({
                'border': 'none',
                'border-radius': '10px',
                'box-shadow': '1px 1px 6px #0000001c',
                'height': '38px'
            });
        
            // Ajusta o alinhamento vertical do texto e o padding
            $('.select2-container--default .select2-selection--single .select2-selection__rendered').css({
                'line-height': '40px',
                'padding-left': '10px',
                'padding-right': '10px',
                'top': '0'
            });
        
            // Estiliza e ajusta a posição do ícone de seta para baixo
            $('.select2-container--default .select2-selection--single .select2-selection__arrow').css({
                'height': '40px'
            });
        });
        
    });
})

const togglePasswordImage = document.getElementById('togglePassword');
const togglePasswordImage2 = document.getElementById('togglePassword2');
const togglePasswordImage3 = document.getElementById('togglePassword3');

function togglePass(passwordInput, togglePasswordImage) {

    if(passwordInput.type === 'password'){
        passwordInput.type = 'text';
        togglePasswordImage.src = '/ProjetoTCC/imagens/eye-slash.svg';
    } else {
        passwordInput.type = 'password';
        togglePasswordImage.src = '/ProjetoTCC/imagens/eye.svg';
    }
}

document.getElementById('togglePassword').addEventListener('click',function(){
    if(passwordInput4) togglePass(passwordInput4,togglePasswordImage);
    else togglePass(passwordInput,togglePasswordImage);
})

document.getElementById('togglePassword2').addEventListener('click',function(){
    if(conf_password_Input2) togglePass(conf_password_Input2,togglePasswordImage2);
    else togglePass(passwordInput2,togglePasswordImage2);
});

document.getElementById('togglePassword3').addEventListener('click',function(){
    togglePass(passwordInput3,togglePasswordImage3);
})

//EDITAR USUARIO!!!!!!!!!!!!!!!!!!!!!!!!!


