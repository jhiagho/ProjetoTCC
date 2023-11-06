const data_inicio = document.querySelector("#Data_inicio")
const form1 = document.querySelector("#form_chamados")
const slc_localizacao = document.querySelector("#slc_localizacao")
const slc_requerente = document.querySelector("#slc_requerente")
const select_prioridade = document.querySelector("#select_prioridade")
const select_status = document.querySelector("#select_status")

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

    data_inicio.value = dataHoraAtual;

});

form1.addEventListener('submit', function(e) {
    // alert("Estou Funcionando");
    // e.preventDefault();

    verificarErro = false;

    if (!slc_localizacao.value){
        document.getElementById("chm_slc_localizacao_Error").textContent = 'Selecione uma localização';
        verificarErro = true;
    } else {
        document.getElementById("chm_slc_localizacao_Error").textContent = '';
    }

    if (!slc_requerente.value){
        document.getElementById("chm_slc_requerente_Error").textContent = 'Selecione um requrente';
        verificarErro = true;
    } else {
        document.getElementById("chm_slc_requerente_Error").textContent = '';
    }


    if (!select_prioridade.value) {
        document.getElementById("chm_select_prioridade_Error").textContent = 'Selecione uma prioridade';
        verificarErro = true;
    } else {
        document.getElementById("chm_select_prioridade_Error").textContent = '';
    }


    if (!select_status.value) {
        document.getElementById("chm_select_status_Error").textContent = 'Selecione um status do chamado';
        verificarErro = true;
    } else {
        document.getElementById("chm_select_status_Error").textContent = '';
    }

    if(verificarErro){
        e.preventDefault();
    }
});

function toggleDrawer() {
    const drawer = document.getElementById("mydrawer");
    const overlay = document.getElementById("overlay");  // Referência ao overlay

    if (drawer.style.width === "0px" || drawer.style.width === "") {
        drawer.style.width = "1000px";
        document.getElementById("btn_toggle_drawer").style.marginRight = "1000px";
        overlay.style.display = "block";  // Mostra o overlay

    } else {
        drawer.style.width = "0px";
        document.getElementById("btn_toggle_drawer").style.marginRight = "0px";
        overlay.style.display = "none";  // Mostra o overlay
    }
 }

/* Criar_chamados.php */

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

/*hub chamados*/ 

$(document).ready(function(){
    $("#main_select").change(function(){
        let selectedValue = $(this).val();
        console.log(selectedValue);

        if(selectedValue > 2){
            $.get('/ProjetoTCC/api/sistema_busca.php', { column: selectedValue }, function(data) {
                let optionsArray = data;
                let optionsHtml = "";

                for (let i = 0; i < optionsArray.length; i++) {
                    optionsHtml += `<option value="${optionsArray[i].value}">${optionsArray[i].text}</option>`;
                }

                $("#dynamic_select_container").html('<select name="detailed_search" class="js-example-basic-single">' + optionsHtml + '</select>');
            });
        }
        else{
            $("#dynamic_select_container").html('<input type="text" name="detailed_search" placeholder="pesquisar...">');
        }
        //Faz a requisição AJAX
    }).change();
});

// SCRIPT PAGINA ADMIIIN ===========================================//////////////////////////////////////////////

