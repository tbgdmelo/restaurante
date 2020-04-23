<?php
    require_once('../backend/functions.php');
    listarBairros();
    listarLanches();
    listarMotoboys();
    listarSituacoes();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Cadastro de Pedido</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/bootstrap/js/bootstrap.min.jss">
</head>

<body>
    <h2>Novo Pedido</h2>
    <div>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <!-- area de campos do form -->
            <hr />
            <div class="row">
                <div class="form-group col-md-3">
                    <label>Lanche:</label>
                    <select class="form-control" name="lanche_pedido['id_lanche']">
                        <option onfocus="true">Selecione...</option>
                        <?php if ($lanches) : ?>
                            <?php foreach ($lanches as $lanche) : ?>
                                <option value="<?php echo $lanche['id_lanche']; ?>"><?php echo $lanche['nome'];?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option>Nenhum registro encontrado.</option>
                        <?php endif; ?>
                    </select>
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

                <div class="form-group col-md-3">
                    <label>Motoboy:</label>
                    <select class="form-control" name="pedido['id_motoboy']">
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
                
                <div class="form-group col-md-3">
                    <label>Destino:</label>
                    <select class="form-control" name="pedido['id_bairro']">
                        <option onfocus="true">Selecione...</option>
                        <?php if ($bairros) : ?>
                            <?php foreach ($bairros as $bairro) : ?>
                                <option value="<?php echo $bairro['id_bairro']; ?>"><?php echo $bairro['nome'];?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option>Nenhum registro encontrado.</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div id="actions" class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Adicionar Pedido</button>
                    <a href="#" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>