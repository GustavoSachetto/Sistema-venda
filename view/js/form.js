$(document).ready(function () {
    // Auto-complete CEP
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

    // Select produto
    let slcProduto = $('#slcProduto');
    const showProduto = $('.showProduto');
    
    slcProduto.change(() => {
        codigoProduto = slcProduto.val();
        produtos.forEach(item => {
            if (item['codProduto'] == codigoProduto) {
                $('#nomeP').text(item['nomeProduto']);
                $('#codP').text(item['codProduto']);
                $('#cateP').text(item['categoria']);
                $('#geneP').text(item['genero']);
                $('#marcaP').text(item['marca']);
                $('#tipoP').text(item['tipo']);
                $('#valorP').text("R$"+item['valorVenda']);
            }
        });
        
        showProduto.slideDown();

        if (!codigoProduto) {
            showProduto.slideUp();
        } 
    });

    // Valor custo e valor venda
    $('#valorCusto').blur(() => {
        let valorMinimo = parseInt($('#valorCusto').val()) +1;
        $('#valorVenda').attr('min', valorMinimo);
    });

    // Reset form
    $('button[type=reset]').click(() => {
        showProduto.slideUp();
    });
});