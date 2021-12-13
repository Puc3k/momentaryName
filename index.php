<?php
declare(strict_types=1);

spl_autoload_register(function (string $name) {
    $name = str_replace(['\\', 'App/'], ['/', ''], $name);
    $path = "src/$name.php";
    require_once($path);
});

use App\Controller;
use App\Request;
use App\View;

require_once("src/Utils/debug.php");
$configuration = require_once("src/config/config.php");

$request = new Request($_GET, $_POST, $_SERVER);

$view = new View();

const DEFAULT_ACTION='list';

$action = $_GET['action'] ?? DEFAULT_ACTION;

$page = 'list.php';
$viewParams = [];
if ($action === 'list') {
    $page = 'list';
    $viewParams['resultList'] = "wyświetlamy notatki";
}else{
   header('index.php');

}

$view->render($page, $viewParams);
Controller::initConfiguration($configuration);

//$db_conn = new PDO("mysql:host=".$configuration['host'].";dbname=".$configuration['database'],$configuration['user'],$configuration['password']);
//$stmt = $db_conn->query('SELECT * FROM product_table');
//while($row = $stmt->fetch()) {  echo $row['product_name'] . ': ilość ' . $row['quanity'] . "\n<br>"; }