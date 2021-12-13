<?php
declare(strict_types=1);

spl_autoload_register(function (string $name) {
    $name = str_replace(['\\', 'App/'], ['/', ''], $name);
    $path = "src/$name.php";
    require_once($path);
});

use App\Controller;
use App\View;

require_once("src/Utils/debug.php");
$configuration = require_once("src/config/config.php");

$request = [
    'get' => $_GET,
    'post' => $_POST
];

$view = new View();

$action = $_GET['action'] ?? DEFAULT_ACTION;

Controller::initConfiguration($configuration);

//$db_conn = new PDO("mysql:host=".$configuration['host'].";dbname=".$configuration['database'],$configuration['user'],$configuration['password']);
//$stmt = $db_conn->query('SELECT * FROM product_table');
//while($row = $stmt->fetch()) {  echo $row['product_name'] . ': ilość ' . $row['quanity'] . "\n<br>"; }
(new Controller($request))->run();