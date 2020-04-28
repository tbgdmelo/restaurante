<?php
    require_once('config/config.php');
    require_once(DBAPI);

    function listarCarnes(){
        global $carnes;
        $carnes = find_all('carne');
    }

    function listarSituacoes(){
        global $situacoes;
        $situacoes = find_all('situacao');
    }

    function listarMotoboys(){
        global $motoboys;
        $motoboys = find_all('motoboy');
    }

    function listarPedidos(){
        global $pedidos;
        $pedidos = find_all_pedidos('pedido');
    }

    function listarPedidosCarne(){
        global $pedidoscarne;
        $pedidoscarne = find_all_pedidos_carne('pedido_carne_nobre');
    }

    /** Função para buscar o nome do motoboy e bairro do pedido */
    function traduzirPedido($id_motoboy = null, $id_situacao = null){
        global $nomeMotoboy;
        global $nomeSituacao;

        $nomeMotoboy = nomesMotoboys($id_motoboy);
        $nomeSituacao = nomesSituacao($id_situacao);
    }

    /** Função para buscar o nome do motoboy e bairro do pedido */
    function traduzirPedidoCarne($id_carne = null, $id_situacao = null){
        global $nomeCarne;
        global $nomeSituacao;

        $nomeCarne = nomesCarne($id_carne);
        $nomeSituacao = nomesSituacao($id_situacao);
    }

    function add() {
        if (!empty($_POST['pedido'])) {
            $pedido = $_POST['pedido'];
            save('pedido', $pedido);
            header('location: gerenciar.php');
        }
    }

    function finaliza($id_pedido){
        despacharPedido($id_pedido);
        header('location: index.php');
    }

    function edit(){
        if (isset($_GET['id_pedido'])) {

            $id_pedido = $_GET['id_pedido'];
    
            if (isset($_POST['pedido'])) {
    
                $pedido = $_POST['pedido'];
    
                update_status('pedido', $id_pedido, $pedido);
                header('location: gerenciar.php');
            } else {
    
                global $pedido;
                $pedido = find_pedido('pedido', $id_pedido);
            }
        } else {
            header('location: gerenciar.php');
        }
    }

    function editCarne(){
        if (isset($_GET['id_pedido'])) {

            $id_pedido = $_GET['id_pedido'];
    
            if (isset($_POST['pedido'])) {
    
                $pedido = $_POST['pedido'];
    
                update_status('pedido_carne_nobre', $id_pedido, $pedido);
                header('location: gerenciar.php');
            } else {
    
                global $pedido;
                $pedido = find_pedido('pedido_carne_nobre', $id_pedido);
            }
        } else {
            header('location: gerenciar.php');
        }
    }

    function somAlerta(){                         
       global $quantidadePedidos;
       $quantidadePedidos = verificaNovoPedido();
       if($quantidadePedidos > 0){
           echo "<audio src='alerta.mp3' autoplay></audio>";
       }
    }

    function addPedidoCarne() {
        if (!empty($_POST['pedido'])) {
            $pedido = $_POST['pedido'];
            save('pedido_carne_nobre', $pedido);
            header('location: gerenciar.php');
        }
    }
    