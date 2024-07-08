<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" 
    referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="../Supercar-css/header.css">
    <link rel="stylesheet" href="../Supercar-css/navbar.css">
    <link rel="stylesheet" href="../Supercar-css/index.css">
    <title>SUPERCAR - WEB</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
    <!-- En-tête de la page -->
    <div class="container-fluid d-flex align-items-center justify-content-between bg-dark" id="header">
        <h6 style="color: #1167eb;">Supercar : Une expérience unique</h6>
        <div class="d-flex">
            <a href="#"><i class="fa-brands fa-facebook-f p-3"></i></a>
            <a href="#"><i class="fa-brands fa-instagram p-3"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter p-3"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in p-3"></i></a>
        </div>
    </div>
    <!--  -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow rounded">
        <div class="container-fluid" id="image">
            <?php
                include("../Database/connexion.php");
                $logo = "SELECT * FROM logos WHERE ID = 1;";
                $curseur = mysqli_query($bdd,$logo);
                if ($curseur) {
                    $row = mysqli_fetch_assoc($curseur);
                    if ($row) {
                        $supercarlogo = $row["Logo"];
                    } else {
                        echo "No row found with ID = 1.";
                    }
                } else {
                    echo "Error: " . mysqli_error($bdd);
                }
                mysqli_close($bdd);
            ?>
            <a class="navbar-brand mx-auto" href="#">
                <img id="logo" src="../Images/Index/Logos/<?php echo $supercarlogo ?>" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center navmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" id="accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="voitures.html" id="voitures">Voitures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="evenement.php" id="evenements">Évènements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="DemandeEssaie.php" id="essai">Demande d'essai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact1.html" id="contact">Contactez-nous</a>
                    </li>
                </ul>
                <div class="d-flex" id="buttons">
                    <a href="signup.html" class="me-2">
                        <button type="button" class="btn" id="btn-1">S'inscrire</button>
                    </a>
                    <a href="login.html">
                        <button type="button" class="btn" id="btn-1">Connexion</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!--  -->
    <!-- Intro by video -->
    <?php 
        include("../Database/connexion.php");
        $bd = "SELECT * FROM accueil WHERE ID = 1;";
        $curseur = mysqli_query($bdd, $bd);
        if ($curseur) {
            $row = mysqli_fetch_assoc($curseur);
            if ($row) {
                $titrevideo = $row["Titrevideo"];
                $video = $row["Video"];
                $lien = $row["Videolien"];
            } else {
                echo "No row found with ID = 1.";
            }
        } else {
            echo "Error: " . mysqli_error($bdd);
        }
        mysqli_close($bdd);
    ?>
    <div class="container-fluid position-relative">
        <video class="w-100" autoplay loop muted>
            <source src="../Images/Index/Bande-annonce/<?php echo $video ?>" type="video/mp4" />
        </video>
        <div class="position-absolute top-50 start-50 translate-middle-x text-center">
            <h2 class="text-white"><?php echo $titrevideo ?></h2>
            <a class="btn btn-primary" href="<?php echo $lien ?>" role="button">Découvrir dés maintenant</a>
        </div>
    </div>
    <!--  -->
    <!-- Outils d'aides -->
    <h2 class="text-center">...</h2>
    <div class="row" id="outils">
        <div class="col-6 col-md-4 d-flex justify-content-center align-items-center flex-column" id="icon">               
            <i class="ri-calendar-todo-line"></i>
            <a type="button" class="btn btn-primary" href="#">Évènements</a>
        </div>
        <div class="col-6 col-md-4 d-flex justify-content-center align-items-center flex-column" id="icon">
            <i class="ri-steering-fill"></i>
            <a type="button" class="btn btn-primary" href="#">Demande d'essai</a>
        </div>
        <div class="col-6 col-md-4 d-flex justify-content-center align-items-center flex-column" id="icon">
            <i class="ri-contacts-book-line"></i>
            <a type="button" class="btn btn-primary" href="#">Contactez-nous</a>
        </div>
    </div>
    <!--  -->
    <!-- Offres -->
    <h2 class="text-center">...</h2>
    <?php 
        include("../Database/connexion.php");
        $offre = "SELECT * FROM accueil JOIN logos ON accueil.ID = logos.ID WHERE accueil.ID BETWEEN 2 AND 3;";
        $curseur = mysqli_query($bdd, $offre);
        if ($curseur) {
            while ($row = mysqli_fetch_array($curseur)){
                $offreimg = $row["Offreimage"];
                $offremodele = $row["Offremodele"];
                $offreprix = $row["Offreprix"];
                $offrelien = $row["Offrelien"];
                $carlogos = $row["Logo"];
    ?>
    <div class="col-9 position-relative mx-auto">
        <img src="../Images/Index/Logos/<?php echo $carlogos ?>"  class="position-absolute" alt="Car logos" id="logos">
        <img src="../Images/Index/Offres/<?php echo $offreimg ?>" class="img-fluid d-block" id="img" alt="Offre image">
        <div class="position-absolute top-0 end-0 text-center" id="description">
            <h3 class="text-white"><?php echo $offremodele ?></h3>
            <h5 class="text-white"><?php echo $offreprix ?>€</h5>
            <a class="btn btn-primary" href="<?php echo $offrelien ?>" role="button">Découvrir dés maintenant</a>
        </div>
    </div>
    <?php
            }
        }else {
            echo "Error: " . mysqli_error($bdd);
        }
        mysqli_close($bdd);
    ?>
    <!--  -->
    <!-- Actualités -->
    <h2 class="text-center">...</h2>
    <?php
        include("../Database/connexion.php");
        $actualite = "SELECT * FROM accueil WHERE ID = 4;";
        $curseur = mysqli_query($bdd, $actualite);
        if ($curseur) {
            while ($row = mysqli_fetch_array($curseur)){
                $actualiteimg = $row["Actualiteimage"];
                $actualitedescription = $row["Actualitedescription"];
                $actualitelien = $row["Actualitelien"];
    ?>
    <div class="card" style="width: 30rem;">
        <img class="card-img-top" src="../Images/Index/Actualités/<?php echo $actualiteimg ?>" alt="Actualité image">
        <div class="card-body">
            <p class="card-text"><?php echo $actualitedescription?></p>
        </div>
    </div>
    <?php
            }
        }else {
            echo "Error: " . mysqli_error($bdd);
        }
        mysqli_close($bdd);
    ?>
    <!--  -->
    <!-- Pied de la page -->
    <div class="container-fluid bg-dark" id="footer">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Accueil</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Voitures</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Arborescence</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Mentions légales</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Contactez-nous</a></li>
            </ul>
            <p class="text-center text-white">&copy; 2024 SUPERCAR</p>
        </footer>
    </div>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>