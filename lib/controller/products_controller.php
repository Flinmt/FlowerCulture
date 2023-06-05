<?php

include "./lib/service/products_services.php";

class ProductsController {

    // list all products
    function getListOfObjects(): array {
        $service = new ProductsServices;
        return $service -> getListOfObjects();
    }
}

?>