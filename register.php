<?php
session_start();
header('Content-Type: application/json');

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
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Toate câmpurile sunt obligatorii']);
        exit();
    }

    $users = getUsers();

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            echo json_encode(['success' => false, 'message' => 'Numele de utilizator sau email-ul este deja folosit']);
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

    echo json_encode(['success' => true, 'message' => 'Înregistrare reușită! Redirecționare...']);
    exit();
}
