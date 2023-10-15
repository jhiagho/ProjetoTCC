const slider = document.getElementById('slider');
const slider_2 = document.getElementById('slider_2');
const buttom_box = document.getElementById('botao_botao-box2');

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
