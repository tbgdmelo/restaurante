<?php
    require_once('../backend/functions.php');
    listarPedidos();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../frontend/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/bootstrap/js/bootstrap.min.jss">
</head>
</br>
    <center><h2>Pedidos Registrados</h2></center>
        <hr>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Nº Pedido</th>
                <th>Lanche</th>
                <th>Status do Pedido</th>
                <th>Motoboy</th>
                <th>Local de Entrega</th>
            </tr>
            </thead>
            
            <tbody>
            <?php if ($pedidos) : ?>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?php echo $pedido['id_pedido']; ?></td>
                    <?php traduzirPedido($pedido['id_motoboy'],$pedido['id_bairro'],$pedido['id_situacao']); ?>
                    <?php traduzirLanchePedido($pedido['id_pedido'])?>
                    <td><?php echo $nomeLanche; ?></td>
                    <td><?php echo $nomeSituacao; ?></td>
                    <td><?php echo $nomeMotoboy; ?></td>
                    <td><?php echo $nomeBairro; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>