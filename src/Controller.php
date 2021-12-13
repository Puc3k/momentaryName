<?php
declare(strict_types=1);

namespace App;

require_once("Database.php");
require_once("View.php");

class Controller
{

    private $view;
    private static $configuration = [];

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->view = new View();
    }

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
        dump($configuration);
    }

}
