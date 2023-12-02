$(document).ready(function () {
    // Button excluir
        $('.excluir').click((e) => {
            if (e.target.classList.contains('produto')) {
                prop = {
                    codigo: e.target.value,
                    text: 'Você realmente deseja excluir este produto?',
                    url: '../../controller/deleteProduto.php'
                }
            }

            if (e.target.classList.contains('cliente')) {
                prop = {
                    codigo: e.target.value,
                    text: 'Você realmente deseja excluir este cliente?',
                    url: '../../controller/deleteCliente.php'
                }
            }

            if (e.target.classList.contains('venda')) {
                prop = {
                    codigo: e.target.value,
                    text: 'Você realmente deseja excluir esta venda?',
                    url: '../../controller/deleteVenda.php'
                }
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
                    $('body').append(data);
                });
            }
        });
    }
});