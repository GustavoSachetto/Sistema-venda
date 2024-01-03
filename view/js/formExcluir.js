$(document).ready(function () {
    let background = "";

    // Button excluir
        $('.excluir').click((e) => {
            prop = {codigo: e.target.value, text: '', url: ''}
            if (e.target.classList.contains('produto')) {
                prop['text'] = 'Você realmente deseja excluir este produto?';
                prop['url'] = '../../controller/deleteProduto.php';
            }

            if (e.target.classList.contains('cliente')) {
                prop['text'] = 'Você realmente deseja excluir este cliente?';
                prop['url'] = '../../controller/deleteCliente.php';
            }

            if (e.target.classList.contains('venda')) {
                prop['text'] = 'Você realmente deseja excluir esta venda?';
                prop['url'] = '../../controller/deleteVenda.php';
            }
            confirm(prop);
        });
        
    // Confirmar exclusão
    function confirm(prop) {
        if ($('body').attr('class') == 'dark') {
            background = '#383838';
        } else {
            background = '#FFFFFF';
        }

        Swal.fire({
            title: "Confirmação!",
            text: prop['text'],
            icon: "warning",
            background: background,
            color: 'var(--title-color)',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, Deletar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(prop['url'], { excluir: prop['codigo'] }, (data) => {
                    let itens = JSON.parse(data);
                    alert(itens['title'], itens['text'], itens['icon']);
                });
            }
        });

        // Alerta do retorno na função
        function alert(title, text, icon) {
            Swal.fire({
                title: title,
                text: text,
                background: background,
                color: 'var(--title-color)',
                icon: icon
            }).then(() => {
                location.reload();   
            });
        }
    }
});