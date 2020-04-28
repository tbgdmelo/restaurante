<?php
    require_once 'functions.php';
    listarPedidosCarne();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Carnes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="30" url="gerenciar.php">
    <link rel="stylesheet" href="frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/bootstrap/js/bootstrap.min.jss">
    <link rel="stylesheet" href="frontend/css/dashboard.css">
</head>
<body class="container">
</br>
    <center><h2>Pedidos Registrados de Carne <img id="logo" src="img/logo.jpeg"></h2></center>
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
