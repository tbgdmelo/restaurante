<?php

/** O nome do banco de dados*/
define('DB_NAME', 'restaurante');

/** Usuário do banco de dados*/
define('DB_USER', 'thiago');

/** Senha do banco de dados*/
define('DB_PASSWORD', 'bragamelo');

/** nome do host*/
define('DB_HOST', 'localhost');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** caminho do arquivo de acesso do banco de dados **/
if ( !defined('DBAPI') )
    define('DBAPI', ABSPATH . '../database/database.php');


