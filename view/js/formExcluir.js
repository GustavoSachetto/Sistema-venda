$(document).ready(function () {
    // Button excluir
        $('.excluir').click((e) => {
            confirm(e.target.id);
        });
        
    // Confirmar exclusão
    function confirm(codigo) {

        if ($('body').attr('class') == 'dark') {
            background = '#383838';
        } else {
            background = '#FFFFFF';
        }
        
        Swal.fire({
            title: "Confirmação!",
            text: "Você realmente deseja excluir este produto?",
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
                $.post("../../controller/deleteProduto.php", { excluir: codigo }, (data) => {
                    $('body').append(data);
                });
            }
        });
    }
});