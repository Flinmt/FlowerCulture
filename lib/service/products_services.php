<?php

include "./lib/repositories/products_repository.php";

class ProductsServices {

    // List all products
    function getListOfObjects(): array {
        $repository = new ProductsRepository(); 
        $products = $repository -> getListOfObjects();

        try {
            if ($products != null) {
                return $products;
            } else {
                throw new Exception("Void");
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}

?>