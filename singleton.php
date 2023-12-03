<?php

class UserRegistry
{
    private static $instance;
    private $users = [];

    private function __construct()
    {
        
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function addUser($username, $email, $password)
    {
       
        $this->users[] = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
    }

    public function getUsers()
    {
        return $this->users;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $userRegistry = UserRegistry::getInstance();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $userRegistry->addUser($username, $email, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singleton Register</title>
</head>
<body>
    <h1>Registro de Usuários</h1>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Registrar</button>
    </form>

    <h2>Usuários Registrados</h2>
    <ul>
        <?php
        foreach ($userRegistry->getUsers() as $user) {
            echo "<li>{$user['username']} - {$user['email']}</li>";
        }
        ?>
    </ul>
</body>
</html>
