<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="../Supercar-css/evenements.css">
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
                $logo = "SELECT * FROM marque WHERE Id_marque = 1;";
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
                        <a class="nav-link" href="evenements.php" id="evenements">Évènements</a>
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
    <?php
        include("../Database/connexion.php");
        $events = "SELECT * FROM evenement a, marque b WHERE a.Id_marque = b.Id_marque;";
        $curseur = mysqli_query($bdd,$events);
        if ($curseur) {
            while ($row = mysqli_fetch_array($curseur)){
                $theme = $row["Theme"];
                $description = $row["Description"];
                $image = $row["Photos"];
                $prix = $row["Prix"];
                $location = $row["Location"];
                $logo = $row["Logo"];
                $date_d = $row["Date_debut"];
                $dateTime_d = new DateTime($date_d);
                $newdate_d = $dateTime_d->format('d F Y');
                $date_f = $row["Date_fin"];
                $dateTime_f = new DateTime($date_f);
                $newdate_f = $dateTime_f->format('d F Y');
    ?>
    <h3 class="mt-5 text-center"><u><?php echo $theme ?></u></h3>
    <div class="position-relative d-flex flex-column align-items-center justify-content-center">
        <div class="card mb-5 mt-4" style="width: 45rem; border: 1px solid red;">
            <img class="card-img" style="border-bottom: 1px solid red;" src=../Images/Evenements/<?php echo $image;?> alt="Card image">
            <div class="position-absolute top-0 end-0">
                <img src="../Images/Logos/<?php echo $logo ?>" alt="Logos" id="logos">
            </div>
            <div class="card-body" style="background-color:#FFFFF9;">
                <h4 class="card-text text-center"><i class="ri-map-pin-2-line"></i><?php echo $location;?></h4>
                <p class="card-text text-center">
                    </p>
                <p class="card-text text-center text-muted text-white"><i class="ri-money-euro-box-line"></i>
                    <?php
                        if ($prix == 0) {
                            echo "<strong> Free </strong>";
                        } else {
                            echo "<strong> $prix € </strong>";
                        }
                    ?></p>
                    <p class="card-text text-center"><i class="ri-calendar-event-line"></i>
                        <?php 
                            if ($date_f == null){
                                echo 'On <u><b>', $newdate_d, '</b></u>';
                            } else{
                                echo 'On <u><b>', $newdate_d,'</b></u> to <u><b>', $newdate_f, '</b></u>';
                            }
                        ?>
                    </p>
                <p class="card-text" style="text-align:justify;"><?php echo $description; ?></p>
            </div>
        </div>
    </div>
    <?php
        }
        mysqli_free_result($curseur);
        } else {
            echo "Error: " . mysqli_error($bdd);
        }
        mysqli_close($bdd);
    ?>
</body>
</html>