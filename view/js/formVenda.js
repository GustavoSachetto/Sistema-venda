$(document).ready(function () {
    let slcCliente = $('#slcCliente');
    const showCliente = $('.showCliente');

    // Select cliente
    slcCliente.change(() => {
        codigoCliente = slcCliente.val();
        clientes.forEach(item => {
            if (item['codCliente'] == codigoCliente) {
                $('#nomeC').text(item['nomeCliente']);
                $('#codC').text(item['codCliente']);
                $('#cpfC').text(item['cpf']);
                $('#cepC').text(item['CEP']);
                $('#estadoC').text(item['UF']);
                $('#cidadeC').text(item['cidade']);
                $('#ruaC').text(item['rua']);
                $('#numeroC').text(item['nResidencial']);
                $('#bairroC').text(item['bairro']);
                $('#logC').text(item['tipoLogradouro']);
                $('#compleC').text(item['complemento']);
                $('#obserC').text(item['observacao']);
            }
        });
        
        showCliente.slideDown();
        
        if (!codigoCliente) {
            showCliente.slideUp();
        } 
    });   

    // Select estoque
    let slcEstoque = $('#slcEstoque');

    slcEstoque.change(() => {
        codigoProduto = slcEstoque.val();
        estoques.forEach(item => {
            if (item['codProduto'] == codigoProduto) {
                $('#txtQuantidade').attr('max', item['quantidade']);
                $('#txtQuantidade').attr('placeholder', "Quantidade disponivel: " + item['quantidade']);
            }
        });
        
        if (!codigoProduto) {
            $('#txtQuantidade').attr('placeholder', "Quantidade");
        } 
    });
    
    // Reset form
    $('button[type=reset]').click(() => {
        showCliente.slideUp();
        $('#txtQuantidade').attr('placeholder', "Quantidade");
    });
});