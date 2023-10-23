const slider = document.getElementById('slider');
const slider_2 = document.getElementById('slider_2');
const buttom_box = document.getElementById('botao_botao-box2');
const data_fim = document.getElementById('solution_data_fim');
const data_task = document.getElementById('task_data');

document.addEventListener("DOMContentLoaded", function() {
    // Pega a data Atual e coloca a data de fim e coloca
    // Pega a data e hora Atual
    var agora = new Date();

    var dd = String(agora.getDate()).padStart(2, '0');
    var mm = String(agora.getMonth() + 1).padStart(2, '0'); // Janeiro é 0!
    var yyyy = agora.getFullYear();

    var hh = String(agora.getHours()).padStart(2, '0');
    var min = String(agora.getMinutes()).padStart(2, '0');

    var dataHoraAtual = yyyy + '-' + mm + '-' + dd + 'T' + hh + ':' + min;

    data_fim.value = dataHoraAtual;
    data_task.value = dataHoraAtual;

});

// Desativa a animação no carregamento da página
slider.classList.add('no-animation');
slider_2.classList.add('no-animation_2');

setTimeout(() => {
    slider.classList.remove('no-animation');
    slider_2.classList.remove('no-animation_2');

    slider.style.display = "block";
    slider_2.style.display = "block";
}, 50);

// Funções para manipular a animação
openSolutionBox = function() {
    slider.classList.remove('slide-up'); 
    slider.classList.add("slide-down");
    if(buttom_box){
        buttom_box.style.display = "none";
    }
}

closeSolutionBox = function() {
    slider.classList.remove("slide-down");
    slider.classList.add('slide-up');
    if(buttom_box){
        buttom_box.style.display = "block";
    }
}

openTarefaBox = function(){
    slider_2.classList.remove('slide-up_2');
    slider_2.classList.add("slide-down_2");
    if(buttom_box){
        buttom_box.style.display = "none";
    }
}

closeTarefaBox = function(){
    slider_2.classList.remove("slide-down_2");
    slider_2.classList.add('slide-up_2');
    if(buttom_box){
        buttom_box.style.display = "block";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
})

/*
            $pendente = $_POST['pendente_Text'];
            $setor = $_POST['slc_setor_taskPendente'];
            $tecnico = $_POST['slc_user_taskPendente'];
            $data = $_POST['task_data'];
            $status = $_POST['select_status_taskPendente'];

*/ 

const slc_setor = document.getElementById('slc_setor_taskPendente');
const slc_user_tecnico = document.getElementById('slc_user_taskPendente');
const task_data = document.getElementById('pendente_Text');
const form2 = document.getElementById('form_tarefa');

/* 
   <span class="error-message" id="task_slc_setor_taskPendente_Error"></span>
    <span class="error-message" id="task_slc_user_taskPendente_Error"></span>
*/

form2.addEventListener('submit', function(e) {  
    verificarErro = false;

    if(!task_data.value){
        document.getElementById("task_pendente_Text_Error").textContent = 'preencha a descrição da Tarefa';
        task_data.style.border = "solid 1px red";
        verificarErro = true;
    } else {
        document.getElementById("task_pendente_Text_Error").textContent = '';
        task_data.style.border = "solid 1px black";
    }

    if(!slc_setor.value){
        document.getElementById("task_slc_setor_taskPendente_Error").textContent = 'Selecione um setor';
        slc_setor.style.border = "solid 1px red";
        verificarErro = true;
    } else {
            document.getElementById("task_slc_setor_taskPendente_Error").textContent = '';
            slc_setor.style.border = "solid 1px black";
        }
    

    if(!slc_user_tecnico.value){
        document.getElementById("task_slc_user_taskPendente_Error").textContent = 'Selecione um Técnico';
        slc_user_tecnico.style.border = "solid 1px red";
        verificarErro = true;
    } else {
            document.getElementById("task_slc_user_taskPendente_Error").textContent = '';
            slc_user_tecnico.style.border = "solid 1px black";
        }

    if(verificarErro){
        e.preventDefault();
    }
});


