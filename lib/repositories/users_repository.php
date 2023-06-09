<?php 

include "./lib/models/users.php";
include "./lib/database/connection.php";

class UsersRepository {

    function login(string $email, string $password): Users {
        $conn = connect();

        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        $result = $conn -> query('SELECT * FROM users WHERE email = ' . $email . 'AND password = ' . $password);
        $conn->close();
        if ($result->num_rows == 1) {
            $user = new Users(
                (int) $result['id'], 
                (string) $result['name'],
                (string) $result['email'],
                (string) $result['password']
            );
            
            return $user;
        };

        die;
    }
}

?>