$(document).ready(function () {
    let notificacao = $('.notificacao');
    notificacao.mouseenter(() => {
    $('p > i').attr('class', 'bx bx-trash');
    $('p > i').css('background', 'var(--button-color-reset)');
   });
});