$(document).ready(function () {
    $('#txtCep').blur(() => {
        let cep = $('#txtCep').val();
        let url = 'https://brasilapi.com.br/api/cep/v1/' + cep;
        $.getJSON(url, (resultado) => {
            $('#txtUF').val(resultado['state']);
            $('#txtCidade').val(resultado['city']);
            $('#txtBairro').val(resultado['neighborhood']);
            $('#txtRua').val(resultado['street']);
        }).fail(() => {
            // Validação do CEP...
        });
    });
});