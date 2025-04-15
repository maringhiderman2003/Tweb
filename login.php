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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Toate câmpurile sunt obligatorii']);
        exit();
    }

    $users = getUsers();

    foreach ($users as $user) {
        if ($user['username'] === $username) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                echo json_encode(['success' => true, 'message' => 'Conectare reușită! Redirecționare...']);
                exit();
            } else {
                echo json_encode(['success' => false, 'message' => 'Parolă incorectă']);
                exit();
            }
        }
    }

    echo json_encode(['success' => false, 'message' => 'Utilizatorul nu există']);
    exit();
}
