<?php
    require_once('functions.php');
    editCarne();
    listarSituacoes();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Finalizar Pedido</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/bootstrap/js/bootstrap.min.jss">
    <link rel="stylesheet" href="frontend/css/cadastro.css">
</head>

<body>
</br>
    <h1 class="container" align="center">Finalizar Pedido <img id="logo" src="img/logo.jpeg"></h2></center></h1>
        <form action="editcarne.php?id_pedido=<?php echo $pedido['id_pedido'];?>" method="post" enctype="multipart/form-data" class="container">
            <!-- area de campos do form -->
            <hr />
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="name">Nº do pedido:</label>
                    <input type="text" class="form-control" value="<?php echo $pedido['id_pedido'];?>" name="pedido[id_pedido]" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label>Situação do Pedido:</label>
                    <select class="form-control" name="pedido[id_situacao]">
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
            </div>
            <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success" >Atualizar Pedido</button>
                    <a href="gerenciar.php" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
</body>