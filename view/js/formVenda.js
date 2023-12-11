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

    // Reset form
    $('button[type=reset]').click(() => {
        showCliente.slideUp();
        $('.txtQuantidade').attr('placeholder', "Quantidade");
    });  
    
    // option select
    function opcoesE(estoques) {
        let option = "";
        for (var element in estoques) {
            option += "<option value=" + estoques[element]['codEstoque'] + "-" + estoques[element]['valorVenda'] + ">" + estoques[element]['codEstoque'] + " - " + estoques[element]['nomeProduto'] + " - " + estoques[element]['tipoTamanho'] + " - " + estoques[element]['genero'] + " - " + estoques[element]['marca'] + "</option>";
        }
        return option;
    }

    var controleCampo = 1;
    
    // Add select estoque
    $('#add').click(() => {
        if (controleCampo < maxP) {
            controleCampo++;
            $('#estoque').append(
            "<div id='produto"+controleCampo+"'>"+
                "<p>Produto: "+controleCampo+"</p><br>"+
                "<select id='slcEstoque"+controleCampo+"' class='slcEstoque' name='cadEstoque[]' required>"+
                    "<option value=''>Selecione um produto</option>"+
                    opcoesE(estoques)+
                "</select>"+
                "<input type='number' placeholder='Quantidade' class='txtQuantidade' min='1' name='cadQuant[]' required>"+
            "</div>");
        } else {
            $(document).ready(function () {
                if ($('body').attr('class') == 'dark') {
                    background = '#383838';
                } else {
                    background = '#FFFFFF';
                }
        
                Swal.fire({
                    title: 'Só há '+maxP+' produtos no estoque!',
                    text: 'Cadastre mais para poder selecionar na venda.',
                    background: background,
                    color: 'var(--title-color)',
                    icon: 'warning'
                });   
            });
        }
    });

    // Remove select estoque
    $('#remove').click(() => {
        $("#produto"+controleCampo).remove();
        if (controleCampo > 1) {
            controleCampo--;
        }
    });

    // Select estoque
    $(document).click(() => {
        $('.slcEstoque').change((e) => {
            slcEstoque = e.target.id;
            codEstoque = e.target.value.split("-")[0];
    
            estoques.forEach(item => {
                if (item['codEstoque'] == codEstoque) {
                    $("#"+slcEstoque).next().attr('max', item['quantidade']);
                    $("#"+slcEstoque).next().attr('placeholder', "Quantidade disponivel: " + item['quantidade']);
                }
            });
        });
    });
});