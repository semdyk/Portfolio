<?php
session_start();
 
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
                <li><a href="#about" class="navitem active">ABOUT</a></li>
                <li><a href="#skills" class="navitem">SKILLS</a></li>
                <li><a href="#portfolio" class="navitem">PORTFOLIO</a></li>
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li><a href="dashboard.php"><i class="fa-solid fa-user"></i></a></li>
                <?php } else { ?>
                    <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    
    <section id="about" class="section about" style="padding: 10px 20px;">
        <div class="content">
            <div class="profile-pic">
                <img id="profile-picture" src="files/foto.jpg" alt="Profile Picture">
            </div>
            <div class="intro">
                <h1>I'M <span>Sem Dyk</span></h1>
                <p>Front/Back End Developer</p>
            </div>
            
        </div>
    </section>

    <section id="skills" class="section skills">
        <div class="content">
            <div class="skill-icons">
                <div class="skill"><img src="files/skills/python.png" alt="Python"><p>Python</p></div>
                <div class="skill"><img src="files/skills/html.png" alt="HTML"><p>HTML</p></div>
                <div class="skill"><img src="files/skills/css.png" alt="CSS"><p>CSS</p></div>
                <div class="skill"><img src="files/skills/javascript.png" alt="JavaScript"><p>JavaScript</p></div>
                <div class="skill"><img src="files/skills/lua.png" alt="LUA"><p>LUA</p></div>
                <div class="skill"><img src="files/skills/php.png" alt="PHP"><p>PHP</p></div>
                <div class="skill"><img src="files/skills/java.png" alt="Java"><p>Java</p></div>
                <div class="skill"><img src="files/skills/mysql.png" alt="MySQL"><p>MySQL</p></div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="section portfolio">
        <div class="content">
            <div class="projects">
                <div onclick="sendToPortfolio(1)" class="project"><img src="files/projects/logos/codelabbslogo.png" alt="Codelabbs"><p>Codelabbs</p></div>
                <div onclick="sendToPortfolio(2)" class="project"><img src="files/projects/logos/gymgrind.png" alt="GymGrind"><p>GymGrind App</p></div>
                <div onclick="sendToPortfolio(3)" class="project"><img src="files/projects/logos/udemy.png" alt="Udemy"><p>FiveM Udemy Course</p></div>
                <div onclick="sendToPortfolio(4)" class="project"><img src="files/projects/logos/fiverr.png" alt="Fiverr"><p>Fiverr</p></div>
                <div onclick="sendToPortfolio(5)" class="project"><img src="files/projects/logos/FiveVacatures.png" alt="FiveVacatures"><p>FiveVacatures</p></div>
                <div onclick="sendToPortfolio(6)" class="project"><img src="files/projects/logos/leaguefm.png" alt="LeagueFM"><p>LeagueFM</p></div>
                <div onclick="sendToPortfolio(7)" class="project"><img src="files/projects/logos/" alt="...."><p>....</p></div>
                <div onclick="sendToPortfolio(8)" class="project"><img src="files/projects/logos/" alt="...."><p>....</p></div>
            </div>
        </div>
    </section>
    <script src="scripts/scripts.js"></script>
</body>
</html>
