$(document).ready(function () {
    const envProduto = $('#envProduto');
    const formProduto = $('#formProduto');
    
    envProduto.click(() => {
        formProduto.submit(() => {
            $('#produto').css('display', 'none');
            $('#tamanho').addClass('active');
        });
    });
});