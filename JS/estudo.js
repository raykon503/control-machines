var qnt_result_pg = 12; //quantidade de registro por pagina
var pagina = 1; // pagina inicial

$(document).ready(function () {
    listar_equipamento(pagina, qnt_result_pg);
    listar_notebook(pagina, qnt_result_pg);
    listar_impressora(pagina, qnt_result_pg);
});

function listar_equipamento(pagina, qnt_result_pg){
    var dados = {
        pagina: pagina,
        qnt_result_pg: qnt_result_pg

    }
    $.post('./PHP/computadores/paginacao.php', dados , function (retorna) {
        //Substitui o valor no seletor id="conteudo"
        $("#conteudo").html(retorna);
    });
}
function listar_notebook(pagina, qnt_result_pg){
    var dados = {
        pagina: pagina,
        qnt_result_pg: qnt_result_pg

    }
    $.post('./PHP/notebooks/paginacao.php', dados , function(retorna){
        $("#conteudo2").html(retorna);
    });
}
function listar_impressora(pagina, qnt_result_pg){
    var dados = {
        pagina: pagina,
        qnt_result_pg: qnt_result_pg

    }
    $.post('./PHP/impressoras/paginacao.php', dados , function(retorna){
        $("#conteudo3").html(retorna);
    });
}

    /*function chamarPhpAjax() {
        $.ajax({
           url:'./PHP/listar_usuario.php',
           complete: function (response) {
              alert(response.responseText);
           },
           error: function () {
               alert('Erro');
           }
       });

       return false;
    }*/

    /*$(document).ready(function(){
                $("a").click(function(){
                    $.ajax({url: "lista_usuario.php", success: function(data){
                        
                    }});
                });
            });
    */