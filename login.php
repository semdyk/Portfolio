<?php
session_start();

require_once 'config.php';
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo '<script>document.getElementById("error-message").style.display = "block";</script>';
            echo '<script>document.getElementById("error-message").innerHTML = "Username not found. Please try again."</script>';
        } else {
            if (!password_verify($password, $result["password"])) {
                echo '<script>document.getElementById("error-message").style.display = "block";</script>';
                echo '<script>document.getElementById("error-message").innerHTML = "Incorrect password. Please try again."</script>';
            } else {
                session_start();
                
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;

                header('Location: index.php');
                exit;
            }
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
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
                <input type="password" id="password" name="password" placeholder="  Password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
        
        <p>Don't have an account? <div onclick="location.href='register.php'" class="other-button">Register</div></p>
        <p style="display: none; color: #cc0000" id="error-message">Incorrect Password</p>
    </section>

    <script src="scripts/scripts.js"></script>
</body>
</html>