<?php
    include_once('script/init.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Recruteur</title>
</head>

<body style ="background-color:#dbdbba;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="recruteur.php">
            <img src="cv.png" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="recruteur.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        session_start();
                        $nom = $_SESSION['connecte']['fname'];
                        $prenom = $_SESSION['connecte']['lname'];
                        echo $nom . ' ' . $prenom;
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Déconnexion</a>

                    </div>
                </li>

            </ul>

        </div>
    </nav>
    <div class="container mt-5">
        <?php
       
        if (is_null($_SESSION['connecte']['offre_id'])) {
        ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">Vous etes recruteur dans l'offre:</div>

                        <hr>
                        <div class="card-body">
                            <?php include('inc/selectionner.offre.php'); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="row">
                <div class="col">
                    <?php include('inc/analyse.form.php'); ?>
                </div>
            </div>
            <?php include('inc/resultat.php'); ?> 
            <div class="row">
                <div class="col">
                    <?php include('inc/demandes.table.php'); ?>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</html>