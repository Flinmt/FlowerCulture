<?php

include "./lib/models/products.php";
include_once ("./lib/database/connection.php");

class ProductsRepository
{

    // List all products
    function getListOfObjects(): array
    {
        $products = [];
        $conn = connect();

        $results = $conn -> query('SELECT * FROM products');

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                $products[] =
                    new Product(
                        (int) $row['id'],
                        (bool) $row['featured'],
                        (string) $row['name'],
                        (string) $row['image'],
                        (float) $row['price'],
                        (int) $row['amount']
                    );
            }
        }

        $conn -> close();
        return $products;
    }
}
