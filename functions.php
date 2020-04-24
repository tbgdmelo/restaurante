<?php
    require_once('config/config.php');
    require_once(DBAPI);

    function listarSituacoes(){
        global $situacoes;
        $situacoes = find_all('situacao');
    }

    function listarMotoboys(){
        global $motoboys;
        $motoboys = find_all('motoboy');
    }

    function listarPedidos($dia){
        global $pedidos;
        $pedidos = find_all_pedidos_day('pedido', $dia);
    }

    /** Função para buscar o nome do motoboy e bairro do pedido */
    function traduzirPedido($id_motoboy = null, $id_situacao = null){
        global $nomeMotoboy;
        global $nomeSituacao;

        $nomeMotoboy = nomesMotoboys($id_motoboy);
        $nomeSituacao = nomesSituacao($id_situacao);
    }

    function add() {
        if (!empty($_POST['pedido'])) {
            $pedido = $_POST['pedido'];
            save('pedido', $pedido);
            header('location: index.php');
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
                header('location: index.php');
            } else {
    
                global $pedido;
                $pedido = find_pedido('pedido', $id_pedido);
            }
        } else {
            header('location: index.php');
        }
    }
    