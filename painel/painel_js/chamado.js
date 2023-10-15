
const buttom_box = document.getElementById('botao_botao-box2');

// function openSolutionBox() {
//     var box = document.getElementById('add_solutionBox');
//     box.classList.add('open');
//     buttom_box.style.display = "none";
// }

// function closeSolutionBox() {
//     var box = document.getElementById('add_solutionBox');
//     box.classList.remove('open');
//     buttom_box.style.display = "block";
// }

// Desativa a animação no carregamento da página
// <div id="slider_2" class="slide-up"> <div id ="slider_id_2">
slider.classList.add('no-animation');
slider_2.classList.add('.no-animation_2');

setTimeout(() => {
    slider.classList.remove('no-animation');
}, 50);

//Slider do Tarefa pendente.
setTimeout(() => {
    slider_2.classList.remove('.no-animation_2');
}, 50);

// Solução.
openSolutionBox = function() {
    slider.classList.remove('no-animation'); // Garante que a animação está ativada
    slider.classList.add("slide-down");
    if(buttom_box){
        buttom_box.style.display = "none";
    }
}

closeSolutionBox = function() {
    slider.classList.remove("slide-down");
    if(buttom_box){
        buttom_box.style.display = "block";
    }
}

//Tarefa Pendente.
openTarefaBox = function(){
    slider_2.classList.remove('.no-animation_2'); // Garante que a animação está ativada
    slider_2.classList.add("slide-down_2");
    if(buttom_box){
        buttom_box.style.display = "none";
    }
}

closeTarefaBox = function(){
    slider_2.classList.remove("slide-down_2");
    if(buttom_box){
        buttom_box.style.display = "block";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
})

