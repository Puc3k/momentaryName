<?php
declare(strict_types=1);

namespace App;

require_once("Database.php");
require_once("View.php");

class Controller
{
    const DEFAULT_ACTION='list';
    private $request;
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
    }
    public function run(): void
    {
        $viewParams = [];

        switch ($this->action()) {
            case 'create':
                $page = 'create';
                $created = false;

                $data = $this->getRequestPost();
                if (!empty($data)) {
                    $created = true;
                    $viewParams = [
                        'title' => $data['title'],
                        'description' => $data['description']
                    ];
                }

                $viewParams['created'] = $created;
                break;
            case 'show':
                $viewParams = [
                    'title' => 'Moja notatka',
                    'description' => 'Opis'
                ];
                break;
            default:
                $page = 'list';
                $viewParams['resultList'] = "wyświetlamy notatki";
                break;
        }

        $this->view->render($page, $viewParams);
    }
    private function action(): string
    {
        $data = $this->getRequestGet();
        return $data['action'] ?? self::DEFAULT_ACTION;
    }

    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }

    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }

}
