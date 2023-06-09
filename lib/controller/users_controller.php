<?php

include "./lib/service/users_services.php";

class UsersController {
    
    function login(string $email, string $password): bool {
        $service = new UsersServices();
        $service->login($email, $password);
        $login = false;

        if (!isset($_SESSION)) {
            $login = true;
        }

        return $login;
    }
}