<?php
    require_once 'functions.php';
    somAlerta();
    listarPedidos();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="30" url="index.php">
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
            </tr>
            </thead>
            
            <tbody align="center">
            <?php if ($pedidos) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?php echo $pedido['id_pedido']; ?></td>
                    <?php traduzirPedido($pedido['id_motoboy'],$pedido['id_situacao']); ?>
                    <td><?php echo $nomeMotoboy; ?></td>
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
</body>
