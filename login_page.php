<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectare</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
<div class="contact-section">
    <div class="overlay"></div>
    <div class="contact-content">
        <h1>Conectare</h1>
        <?php
        if (isset($_GET['error'])) {
            echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
        <form action="login.php" method="POST">
            <p>
                <label for="username">Nume utilizator:</label><br>
                <input type="text" id="username" name="username" required>
            </p>
            <p>
                <label for="password">Parolă:</label><br>
                <input type="password" id="password" name="password" required>
            </p>
            <p>
                <input type="submit" value="Conectează-te"
                       style="background-color: #FFD700; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            </p>
        </form>
        <p>Nu ai cont? <a href="register_page.php" class="highlight">Înregistrează-te</a></p>
    </div>
</div>
</body>
</html>