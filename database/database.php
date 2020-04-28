<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

function find_all( $table ) {
    $database = open_database();
    $found = null;

    $sql = "SELECT * FROM " . $table;
    $result = $database->query($sql);

    if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
    }
    close_database($database);
    return $found;
}

function save($table = null, $data = null) {

    $database = open_database();

    $columns = null;
    $values = null;

    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
    }

    // remove a ultima virgula
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');

    $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

    try {
        $database->query($sql);

        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';

    } catch (Exception $e) {

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

function nomesMotoboys($id = null){
    $database = open_database();
    
    $sql = "SELECT * FROM motoboy WHERE id_motoboy = " . $id;
    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    $nome = $data['nome'];
    return $nome;
}


function nomesCarne($id = null){
    $database = open_database();
    
    $sql = "SELECT * FROM carne WHERE id_carne = " . $id;
    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    $nome = $data['nome'];
    return $nome;
}

function nomesSituacao($id = null){
    $database = open_database();
    
    $sql = "SELECT * FROM situacao WHERE id_situacao = " . $id;
    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    $nome = $data['nome'];
    return $nome;
}

function find_all_pedidos( $table) {
    $database = open_database();
    $found = null;

    $sql = "SELECT * FROM " . $table . " WHERE id_situacao <> 2 ORDER BY id_situacao;";
    $result = $database->query($sql);

    if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
    }
    close_database($database);
    return $found;
}

function find_all_pedidos_carne( $table) {
    $database = open_database();
    $found = null;

    $sql = "SELECT * FROM " . $table . " WHERE id_situacao <> 2 ORDER BY id_situacao;";
    $result = $database->query($sql);

    if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
    }
    close_database($database);
    return $found;
}

function despacharPedido($id_pedido){
    $database = open_database();
    
    $sql = "UPDATE pedido SET id_situacao = 2 WHERE id_pedido = " . $id_pedido . ";";
    
    try {
        $database->query($sql);

        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';

    } catch (Exception $e) {

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

function update_status($table = null, $id_pedido = 0, $data = null) {

    $database = open_database();

    $items = null;

    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }

    // remove a ultima virgula
    $items = rtrim($items, ',');

    $sql  = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id_pedido = " . $id_pedido . ";";

    try {
        $database->query($sql);

        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';

    } catch (Exception $e) {

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

function find_pedido( $table = null, $id_pedido = null ) {

    $database = open_database();
    $found = null;

    try {
        if ($id_pedido) {
            $sql = "SELECT * FROM " . $table . " WHERE id_pedido = " . $id_pedido;
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }

        } else {

            $sql = "SELECT * FROM " . $table;
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_all(MYSQLI_ASSOC);
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
    return $found;
}

function verificaNovoPedido(){
    $database = open_database();
    $sql = "SELECT COUNT(id_pedido) AS quantidade FROM pedido where id_situacao = 1;";
    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['quantidade'];
}