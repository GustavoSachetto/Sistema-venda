$(document).ready(function () {
    const envProduto = $('#envProduto');
    const formProduto = $('#produto');
    const formTamanho = $('.tamanho');
    
    envProduto.submit(() => {
        formProduto.css('display', 'none');
        formTamanho.classAdd('active');
    });
});