<?php
require_once 'config.php';


$projectId = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM projects WHERE id = :projectId");
$stmt->bindParam(":projectId", $projectId);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $result["title"];
$description = $result["description"];
$images = explode(',', $result["images"]); 



if (!$result) {
    header('Location: index.php');
    exit;
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
    <style>
        .dashboard {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
            padding: 20px;
        }
        .content {
            flex: 1;
            max-width: 50%;
            text-align: left; 
        }
        .gallery {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); 
            gap: 10px;
        }
        .gallery img {
            width: 200px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header>
        <img src="files/logo.png" class="logo" alt="Logo" id="logo">
        <nav>
            <ul>
                <li><a href="index.php#about">ABOUT</a></li>
                <li><a href="index.php#skills">SKILLS</a></li>
                <li><a href="index.php#portfolio" class="navitem active">PORTFOLIO</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <section id="dashboard" class="section dashboard">
        <div class="content">
            <h1><?php echo htmlspecialchars($title); ?></h1>
            <p><?php echo htmlspecialchars($description); ?></p>
        </div>
        <div class="gallery">
            <?php foreach ($images as $image): ?>
                <img src="<?php echo htmlspecialchars(trim($image)); ?>" alt="Project Image">
            <?php endforeach; ?>
        </div>
    </section>

    <script src="scripts/scripts.js"></script>
</body>
</html>
