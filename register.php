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

function saveUsers($users)
{
    $file = 'users.json';
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: register.php?error=Toate câmpurile sunt obligatorii");
        exit();
    }

    $users = getUsers();

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            header("Location: register.php?error=Numele de utilizator este deja folosit");
            exit();
        }
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUser = [
        'id' => count($users) + 1,
        'username' => $username,
        'password' => $hashedPassword,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $users[] = $newUser;
    saveUsers($users);

    $_SESSION['user_id'] = $newUser['id'];
    $_SESSION['username'] = $username;

    header("Location: index.php");
    exit();
}
