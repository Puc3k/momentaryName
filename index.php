<?php
declare(strict_types=1);

spl_autoload_register(function (string $name) {
    $name = str_replace(['\\', 'App/'], ['/', ''], $name);
    $path = "src/$name.php";
    require_once($path);
});

use App\Request;

require_once("src/Utils/debug.php");

dump($_SERVER);
$request = new Request($_GET, $_POST, $_SERVER);

?>
<h1> Test</h1>
