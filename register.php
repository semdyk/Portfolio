<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        echo "Username is already taken.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $hashed_password);
            if ($stmt->execute()) {
                header('Location: login.php');
                exit;
            } else {
                echo "Error: " . $conn->errorInfo()[2];
            }
        }
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sem Dyk - Portfolio</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@500&family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://css.gg/css" rel="stylesheet" />
</head>
<body>
    <header>
        <img src="files/logo.png" class="logo" alt="Logo" id="logo">
        <nav>
            <ul>
                <li><a href="index.php#about">ABOUT</a></li>
                <li><a href="index.php#skills">SKILLS</a></li>
                <li><a href="index.php#portfolio">PORTFOLIO</a></li>
                <li><a href="login.php" class="navitem active"><i class="fa-solid fa-right-to-bracket"></i></a></li>
            </ul>
        </nav>
    </header>
    
    <section id="login" class="section login">
        <div class="content">
            <form action="" method="post" class="login-form">
                <div class="input-group">
                    <input type="text" id="username" name="username" placeholder="  Username" required>
                    <i class="fas fa-user"></i>
                </div>
                <div class="input-group">
                    <input type="text" id="email" name="email" placeholder="  Email" required>
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="  Password" required>
                    <i class="fas fa-lock"></i>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
        <p>Already have an account? <div onclick="location.href='login.php'" class="other-button">Login</div></p>
        <p style="display: none; color: #cc0000" id="error-message">Incorrect Password</p>
    </section>
</body>
</html>