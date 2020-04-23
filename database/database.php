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

function nomesBairros($id = null){
    $database = open_database();
    
    $sql = "SELECT * FROM bairro WHERE id_bairro = " . $id;
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

function idLanches($id = null){
    $database = open_database();
    
    $sql = "SELECT * FROM lanche_pedido WHERE id_pedido = " . $id;
    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    $id = $data['id_lanche'];
    return $id;
}

function nomeLanche($id = null){
    $database = open_database();
    
    $sql = "SELECT * FROM lanche WHERE id_lanche = " . $id;
    $result=mysqli_query($database, $sql);
    $data = mysqli_fetch_assoc($result);
    $nome = $data['nome'];
    return $nome;
}
