<?php
if(!isset($_SESSION)){
    session_start();
}
$GLOBALS['config'] = array(
    'DB' => array(
        'host' => '127.0.0.1' ,
        'user' => 'root' ,
        'password' => '' ,
        'db_name' => 'vanila-php-api-test'
    ),
    'status' => true,
    'app_dir' => 'C:/xsampp/htdocs/VanilaPhpApiTest/' ,
    'session' => array()
);
spl_autoload_register(function ($class) {
    require_once "classes/{$class}.php";
});

ob_start();
//$pdo = Connect::getInstance();
//$//pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );