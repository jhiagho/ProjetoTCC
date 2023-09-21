
const data_inicio = document.querySelector("#Data_inicio")
const prazo = document.querySelector("#prazo")
const form1 = document.querySelector("#form_chamados")

form1.addEventListener("submit", (event) => {
    
    console.log("Estou aqui");
    event.preventDefault();
    
    })


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
