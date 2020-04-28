<?php
    require_once 'functions.php';
    listarPedidos();
    listarPedidosCarne();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Funcionário</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="30" url="gerenciar.php">
    <link rel="stylesheet" href="frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/bootstrap/js/bootstrap.min.jss">
    <link rel="stylesheet" href="frontend/css/dashboard.css">
</head>
<body class="container">
</br>
    <center><h2>Pedidos Registrados <img id="logo" src="img/logo.jpeg"></h2></center>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr align="center">
                <th>Nº Pedido</th>
                <th>Motoboy</th>
            </tr>
            </thead>
            
            <tbody align="center">
            <?php if ($pedidos) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?php echo $pedido['id_pedido']; ?></td>
                    <?php traduzirPedido($pedido['id_motoboy'],$pedido['id_situacao']); ?>
                    <td><?php echo $nomeMotoboy; ?></td>
                    <td class="actions text-rigth" style="width: 100px; padding:10px; _width: 255px">
                        <a href="edit.php?id_pedido=<?php echo $pedido['id_pedido'];?>" class="btn btn-sm btn-warning">Despachar</a>
                    </td>   
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Não há pedidos em aberto.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" onclick="window.location.href='cadastropedido.php'" class="btn btn-primary" >Pedido Comum</button>
        </div>
    </div>

    </br>
    <center><h2>Pedidos de Carne </h2></center>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr align="center">
                <th>Nº Pedido</th>
                <th>Carne</th>
            </tr>
            </thead>
            
            <tbody align="center">
            <?php if ($pedidoscarne) : ?>
            <?php foreach ($pedidoscarne as $pedidocarne) : ?>
                <tr>
                    <td><?php echo $pedidocarne['id_pedido']; ?></td>
                    <?php traduzirPedidoCarne($pedidocarne['id_carne'],$pedidocarne['id_situacao']); ?>
                    <td><?php echo $nomeCarne; ?></td>
                    <td class="actions text-rigth" style="width: 100px; padding:10px; _width: 255px">
                        <a href="editcarne.php?id_pedido=<?php echo $pedidocarne['id_pedido'];?>" class="btn btn-sm btn-warning">Finalizar</a>
                    </td>   
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Não há pedidos em aberto.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" onclick="window.location.href='cadastrocarnenobre.php'" class="btn btn-primary" >Pedido de Carne Nobre</button>
        </div>
    </div>
</body>
