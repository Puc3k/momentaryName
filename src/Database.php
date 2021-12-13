<?php

declare(strict_types=1);

namespace App;

use Throwable;
use PDO;

class Database
{
    public function get(): array
    {
        try{
            $query = "SELECT * FROM products";
            $result = $this->conn()->query($query);
            $product = $result->fetch(PDO::FETCH_ASSOC);

        }
        catch(Throwable $e)
        {
            echo "Nie udało się połączyć z bazą danych :(";
        }
        if(!$product)
        {
            echo 'Brak produktów :/';
        }
        return $product;
    }

}