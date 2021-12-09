<?php
declare(strict_types=1);

namespace App;

class Request
{
    private $post = [];
    private $get = [];
    private $server = [];

    public function __construct(array $get, array $post, array $server){
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }


}