$(document).ready(function () {
    let selecionar = $('#slcProduto');
    selecionar.change(() => {
        codigoProduto = selecionar.val();
        produtos.forEach(item => {
            if (item['codProduto'] == codigoProduto) {
                $('#nomeP').text(item['nomeProduto']);
                $('#codP').text(item['codProduto']);
                $('#cateP').text(item['categoria']);
                $('#geneP').text(item['genero']);
                $('#marcaP').text(item['marca']);
                $('#tipoP').text(item['tipo']);
                $('#valorP').text("R$"+item['valor']);
            }
        });
    }); 
});
