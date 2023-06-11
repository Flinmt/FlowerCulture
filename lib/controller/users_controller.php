<?php

include "./lib/service/users_services.php";

class UsersController {
    
    function login(string $email, string $password): void {
        $service = new UsersServices();
        $service->login($email, $password);

        header("Location: index.php");
    }
}