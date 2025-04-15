<?php
session_start();

function getUsers()
{
    $file = 'users.json';
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }
    $data = file_get_contents($file);
    return json_decode($data, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: login.php?error=Toate câmpurile sunt obligatorii");
        exit();
    }

    $users = getUsers();

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Parolă incorectă");
                exit();
            }
        }
    }

    header("Location: login.php?error=Utilizatorul nu există");
    exit();
}
