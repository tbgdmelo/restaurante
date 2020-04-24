<?php
    require_once 'functions.php';
    listarPedidos(date('Y-m-d'));
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/bootstrap/js/bootstrap.min.jss">
    <link rel="stylesheet" href="frontend/css/dashboard.css">
</head>
<body class="container"></body>
</br>
    <center><h2>Pedidos Registrados <img id="logo" src="img/logo.jpeg"></h2></center>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr align="center">
                <th>Nº Pedido</th>
                <th>Motoboy</th>
                <th>Status do Pedido</th>
            </tr>
            </thead>
            
            <tbody align="center">
            <?php if ($pedidos) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?php echo $pedido['id_pedido']; ?></td>
                    <?php traduzirPedido($pedido['id_motoboy'],$pedido['id_situacao']); ?>
                    <td><?php echo $nomeMotoboy; ?></td>
                    <td><?php echo $nomeSituacao; ?></td>
                    <td class="actions text-rigth" style="width: 100px; padding:10px; _width: 255px">
                        <a href="edit.php?id_pedido=<?php echo $pedido['id_pedido'];?>" class="btn btn-sm btn-warning">Despachar</a>
                    </td>   
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" onclick="window.location.href='cadastropedido.php'" class="btn btn-primary" >Adicionar Pedido</button>
        </div>
    </div>
</body>
