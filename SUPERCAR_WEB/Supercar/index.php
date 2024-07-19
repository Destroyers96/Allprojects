<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Supercar-css/index.css">
    <link rel="stylesheet" href="../Supercar-css/navbar.css">
    <title>Supercar</title>
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container-fluid" id="image">
            <?php
                include("../Database/connexion.php");
                $logo = "SELECT * FROM marque WHERE Nom = 'Supercar logo';";
                $curseur = mysqli_query($bdd,$logo);
                if ($curseur) {
                    $row = mysqli_fetch_assoc($curseur);
                    if ($row) {
                        $supercarlogo = $row["Logo"];
                    }
                    mysqli_free_result($curseur);
                } else {
                    echo "Error: " . mysqli_error($bdd);
                }
                mysqli_close($bdd);
            ?>
            <a class="navbar-brand mx-auto" href="#">
                <img id="logo" src="../Images/Logos/<?php echo $supercarlogo ?>" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center navmenu">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" id="accueil">Accueil</a>
                    </li>
                    <li class="nav-item dropdown" id="dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Voitures
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Porsche</a></li>
                            <li><a class="dropdown-item" href="#">Ferrari</a></li>
                            <li><a class="dropdown-item" href="#">Jeep</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="evenements">Évènements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="essai">Demande d'essai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="contact">Contactez-nous</a>
                    </li>
                </ul>
                <div class="d-flex" id="buttons">
                    <a href="#" class="me-2">
                        <button type="button" class="btn rounded-0" id="btn-1">S'inscrire</button>
                    </a>
                    <a href="#">
                        <button type="button" class="btn rounded-0" id="btn-1">Connexion</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!--  -->
    <!-- First section -->
    <?php
        include("../Database/connexion.php");
        $section1 = "SELECT * FROM accueil a, marque b WHERE a.marque = b.Nom AND a.Id = 1;";
        $curseur = mysqli_query($bdd,$section1);
        if ($curseur) {
            $row = mysqli_fetch_assoc($curseur);
            if ($row) {
                $video = $row["Video"];
                $modele = $row["Modele"];
                $lien = $row["Lien"];
                $description = $row["Description"];
                $marque = $row["Marque"];
                $logo = $row["Logo"];
            }
            mysqli_free_result($curseur);
        } else {
            echo "Error: " . mysqli_error($bdd);
        }
        mysqli_close($bdd);
    ?>
    <div class="position-relative w-100 d-flex justify-content-center align-items-center mt-3">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <video class="w-75 rounded mt-5 mb-5 border border-light" autoplay loop muted>
                <source src="../Images/Index/Section1/<?php echo $video ?>" type="video/mp4" />
            </video>
            <div class="position-absolute w-75 top-0 mt-5">
                <img src="../Images/Logos/<?php echo $logo ?>" alt="Porsche logo" id="logos">
            </div>
            <div class="position-absolute d-flex justify-content-between align-items-end w-75 bottom-0 mb-5">
                <h2 class="text-white w-25" id="modele"><?php echo $modele ?></h2>
                <a class="btn d-flex justify-content-center align-items-center" href="<?php echo $lien ?>" role="button" id="explorer">Explorer</a>
            </div>
        </div>
    </div>
    <h2 class="text-center mt-5"><?php echo $marque ?></h2>
    <div class="w-100 d-flex justify-content-center align-items-center mt-4 mb-5">
        <p class="w-50 text-center" id="description"><?php echo $description ?></p>
    </div>
    <!-- Second section -->
    <?php
        include("../Database/connexion.php");
        $section2 = "SELECT * FROM accueil a, marque b WHERE a.marque = b.Nom AND a.Id IN (2, 3);";
        $curseur = mysqli_query($bdd,$section2);
        if ($curseur) {
            while ($row = mysqli_fetch_assoc($curseur)){
                $image = $row["Photo"];
                $modele = $row["Modele"];
                $lien = $row["Lien"];
                $description = $row["Description"];
                $marque = $row["Marque"];
                $logo = $row["Logo"];
    ?>
    <div class="position-relative w-100 d-flex justify-content-center align-items-center">
        <img class="w-75 rounded" src="../Images/Index/Section2/<?php echo $image ?>" alt="image">
        <div class="position-absolute w-75 top-0">
            <img src="../Images/Logos/<?php echo $logo ?>" alt="Logos" id="logos">
        </div>
        <div class="w-75 position-absolute">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <h3 class="text-white "><?php echo $modele ?></h3>
                <a class="btn d-flex justify-content-center align-items-center" id="explorer" href="<?php echo $lien ?>" role="button">Explorer</a>
            </div>
        </div>
    </div>
    <h2 class="text-center mt-5"><?php echo $marque ?></h2>
    <div class="w-100 d-flex justify-content-center align-items-center mt-4 mb-5">
        <p class="w-50 text-center" id="description"><?php echo $description ?></p>
    </div>
    <?php
        }
        mysqli_free_result($curseur);
        } else {
            echo "Error: " . mysqli_error($bdd);
        }
        mysqli_close($bdd);
    ?>
    <!--  -->
    <!-- Third section -->
    <h2 class="text-center mt-5">...</h2>
    <div class="d-flex justify-content-around align-items-center">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>