<?php
session_start();

if (!isset($_SESSION['number'])) {
    $_SESSION['number'] = rand(1, 10);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guess = $_POST['guess'];

    if ($guess == $_SESSION['number']) {
        $message = '¡Felicidades! ¡Has adivinado el número!';
        unset($_SESSION['number']);
    } else {
        $message = 'Intenta de nuevo. El número es diferente.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess Game - PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Guess the Number - PHP</h1>
        <p><?php echo $message; ?></p>
        <form method="post">
            <label for="guess">Tu Adivinanza:</label>
            <input type="number" name="guess" required>
            <button type="submit">Adivinar</button>
        </form>
    </div>
</body>
</html>
