$(document).ready(function () {

    const btnSidebar = $('.btn-sidebar');
    const tema = $('#tema');
    const textSwitch = $('.text-switch');

    btnSidebar.click(() => {
        $('.sidebar').toggleClass('close');
    });

    tema.click(() => {
        $('body').toggleClass('dark');
        if ($('body').attr('class') == 'dark') {
            textSwitch.text('Modo claro');
        } else {
            textSwitch.text('Modo escuro');
        }
    }); 
});