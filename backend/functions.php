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

    function listarLanches(){
        global $lanches;
        $lanches = find_all('lanche');
    }

    function listarBairros(){
        global $bairros;
        $bairros = find_all('bairro');
    }

    function listarPedidos(){
        global $pedidos;
        $pedidos = find_all('pedido');
    }


    /** Função para buscar o nome do motoboy e bairro do pedido */
    function traduzirPedido($id_motoboy = null, $id_bairro = null, $id_situacao = null){
        global $nomeMotoboy;
        global $nomeBairro;
        global $nomeSituacao;

        $nomeMotoboy = nomesMotoboys($id_motoboy);
        $nomeBairro = nomesBairros($id_bairro);
        $nomeSituacao = nomesSituacao($id_situacao);
    }

    /** Função para buscar o nome dos lanches pelo ID */
    function traduzirLanche($id_lanche = null){
        global $nomeLanche;
        $nomeLanche = nomeLanche($id_lanche);
    }

    /** Função para buscar o ID dos lanches do pedido */
    function traduzirLanchePedido($id_pedido = null){
        global $idLanche;

        $idLanche = idLanches($id_pedido);
        traduzirLanche($idLanche);
    }

    function add() {
        if (!empty($_POST['pedido'])) {
            $pedido = $_POST['pedido'];
            save('pedido', $pedido);
            header('location: index.php');
        }
    }
    