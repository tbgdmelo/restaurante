<?php
    require_once('../config/config.php');
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
    