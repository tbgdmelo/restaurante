<?php
    require_once('functions.php');
    addPedido();
    listarMotoboys();
    listarSituacoes();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="frontend/fontawesome/font-awesome.min.css">
	<script src="frontend/jquery/jquery.min.js"></script>
    <title>Cadastro de Pedido</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="frontend/css/cadastro.css">
</head>

<body>
</br>
    <h1 class="container" align="center">Novo Pedido <img id="logo" src="img/logo.jpeg"></center></h1>
        <form action="cadastropedido.php" method="post" enctype="multipart/form-data" class="container">
            <!-- area de campos do form -->
            <hr />
            <div class="row">
                <div class="form-group col-md-2 campoDefault" id="origem">
                    <label for="name">Nº do pedido:</label>
                    <input type="text" class="form-control campoDefault" name="pedidos['1']">
                    <div id="imendaHTMLemail"></div>
                    <a href="#" id="btnAdicionarPedido" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                </div>

                <div class="form-group col-md-3">
                    <label>Situação do Pedido:</label>
                    <select class="form-control" name="id_situacao">
                        <option onfocus="true">Selecione...</option>
                        <?php if ($situacoes) : ?>
                            <?php foreach ($situacoes as $situacao) : ?>
                                <option value="<?php echo $situacao['id_situacao']; ?>"><?php echo $situacao['nome'];?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option>Nenhum registro encontrado.</option>
                        <?php endif; ?>
                    </select>
                </div>        

                <div class="form-group col-md-3">
                    <label>Motoboy:</label>
                    <select class="form-control" name="id_motoboy">
                        <option onfocus="true">Selecione...</option>
                        <?php if ($motoboys) : ?>
                            <?php foreach ($motoboys as $motoboy) : ?>
                                <option value="<?php echo $motoboy['id_motoboy']; ?>"><?php echo $motoboy['nome'];?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option>Nenhum registro encontrado.</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success" >Adicionar Pedido</button>
                    <a href="gerenciar.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
</body>


<script type="text/javascript">

	var idContador = 1;
			
	function exclui(id){
		var campo = $("#"+id.id);
		campo.hide(200);
	}

	$( document ).ready(function() {
		
		$("#btnAdicionarPedido").click(function(e){
			e.preventDefault();
			var tipoCampo = "email";
			adicionaCampo(tipoCampo);
		})		
		function adicionaCampo(tipo){

			idContador++;
			
			var idCampo = "campoExtra"+idContador;
			var idForm = "formExtra"+idContador;
		
			var html = '';
			
			html += '<div style="margin-top: 8px;" class="input-group" id="'+idForm+'">';
			html += '<input type="text" name="pedidos[\''+idContador+'\']" id="'+idCampo+'" class="form-control novoCampo"/>';
			html += "<span class='input-group-btn'>";
			html +=	"<button class='btn' onclick='exclui("+idForm+")' type='button'><span class='fa fa-trash'></span></button>";
			html += "</span>";
			html += "</div>";
			
			$("#imendaHTML"+tipo).append(html);
		}
		
		$(".btnExcluir").click(function(){
			console.log("clicou");
			$(this).slideUp(200);
		})
		
		$("#btnSalvar").click(function(){
		
		var mensagem = "";
		var novosCampos = [];
		var camposNulos = false;
		
			$('.campoDefault').each(function(){
				if($(this).val().length < 1){
					camposNulos = true;
				}
			});
			$('.novoCampo').each(function(){
				if($(this).is(":visible")){
					if($(this).val().length < 1){
						camposNulos = true;
					}
					//novosCampos.push($(this).val());
					mensagem+= $(this).val()+"\n";
				}
			});
			novosCampos = [];
		})
		
	});
	
</script>
