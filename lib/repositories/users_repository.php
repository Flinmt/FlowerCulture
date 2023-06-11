<?php 

include_once "./lib/models/users.php";
include_once "./lib/database/connection.php";

class UsersRepository {
    function login(string $email, string $password): Users {
        $conn = connect();

        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);
        $sql_code = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        $result = $conn->query($sql_code) or die("Falha na conexão: " . $conn->error);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $user = new Users(
                (int) $row['id'], 
                (string) $row['name'],
                (string) $row['email'],
                (string) $row['password'],
                (string) $row['image']
            );
            $conn->close();
            return $user;
        }

        $conn->close();
        die (header("Location: /flower/index.php"));
    }
}

?>