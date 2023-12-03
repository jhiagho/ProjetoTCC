function updateLocalizacaoSpan() {
    var selectElement = document.getElementById('id_localizacao_editar_chm');
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var localizacao = selectedOption.getAttribute('data-localizacao');
    
    // Atualizar o span com a localização
    document.getElementById('localizacaoSpan').textContent = localizacao;
}

function confirmarAcao(mensagem) {
    return confirm(mensagem);
}
