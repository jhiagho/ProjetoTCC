function updateLocalizacaoSpan() {
    var selectElement = document.getElementById('id_localizacao_editar_chm');
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var localizacao = selectedOption.getAttribute('data-localizacao');
    
    // Atualizar o span com a localização
    document.getElementById('localizacaoSpan').textContent = localizacao;
}

document.addEventListener("DOMContentLoaded", function() {
    $(document).ready(function() {
        $('.js-example-basic-single').select2();

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

function confirmarAcao(mensagem) {
    return confirm(mensagem);
}
