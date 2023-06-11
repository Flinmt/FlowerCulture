<?php

include "./lib/repositories/users_repository.php";

class UsersServices {

    function login(string $email, string $password): void {
        $repository = new UsersRepository();
        $login = $repository -> login($email, $password);

        if (!empty($login)) {
            if (!isset($_SESSION)) {
                session_start();
            }

           $_SESSION['user'] = $login->getId();
           $_SESSION['name'] = $login->getName();
           $_SESSION['img'] = $login->getImg();
        }
    }
}

?>