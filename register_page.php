<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
<div class="contact-section">
    <div class="overlay"></div>
    <div class="contact-content">
        <h1>Înregistrare</h1>
        <?php
        if (isset($_GET['error'])) {
            echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
        }
        ?>
        <form action="register.php" method="POST">
            <p>
                <label for="username">Nume utilizator:</label><br>
                <input type="text" id="username" name="username" required>
            </p>
            <p>
                <label for="password">Parolă:</label><br>
                <input type="password" id="password" name="password" required>
            </p>
            <p>
                <input type="submit" value="Înregistrează-te"
                       style="background-color: #FFD700; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            </p>
        </form>
        <p>Ai deja cont? <a href="login_page.php" class="highlight">Conectează-te</a></p>
    </div>
</div>
</body>
</html>