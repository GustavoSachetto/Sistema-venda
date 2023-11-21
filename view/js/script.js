$(document).ready(function () {
    const btnSidebar = $('.btn-sidebar');
    const tema = $('#tema');
    const textSwitch = $('.text-switch');
    
    // Sidebar modo
    btnSidebar.click(() => {
        $('.sidebar').toggleClass('close');
    });

    // Tema modo
    tema.click(() => {
        var theme; 
        $('body').toggleClass('dark');
        
        if ($('body').attr('class') == 'dark') {
            textSwitch.text('Modo claro');
            theme = 'DARK';
        } else {
            textSwitch.text('Modo escuro');
            theme = 'DEFAULT';
        }

        localStorage.setItem('pageTheme', theme);
    }); 
    
    let getTheme = localStorage.getItem('pageTheme');
    
    if (getTheme === 'DARK') {
        $('body').addClass('dark');
        textSwitch.text('Modo claro');
    } else {
        $('body').removeClass('dark');
        textSwitch.text('Modo escuro');
    }
});