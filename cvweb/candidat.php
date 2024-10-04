<?php

include 'script/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Candidat</title>
</head>

<body style ="background-color:#dbdbba;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="candidat.php">
    <img src="cv.png" height="50px">
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="candidat.php">Accueil <span class="sr-only">(current)</span></a>
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

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">Liste des offres</div>
                    <div class="card-body">
                        <?php 
                            if(isset($_SESSION['msg'])){
                                ?>
                                <div class="alert alert-info"><?= $_SESSION['msg'] ?></div>
                                <?php
                            }
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Offre</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $offres = getOffres();
                                $i = 0;
                                foreach ($offres as $offre) {
                                ?>
                                    <tr>
                                        <td><?= $offre['libelle'] ?></td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?= $i ?>">
                                                postuler
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop<?= $i ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Importer Votre CV</h5>
                                                       
                                                        </div>
                                                        <div class="modal-body">
                                                           <form action="upload_cv.php?id=<?= $_SESSION['connecte']['id'] ?>&offre_id=<?= $offre['id'] ?>" method="post" enctype="multipart/form-data">
                                                               <div class="form-group">
                                                                   
                                                                   <input type="file" name="cv" id="" class="">
                                                               </div>
                                                               <button type="submit" class="btn btn-sm btn-block btn-primary">Envoyer</button>
                                                           </form>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                $i++;
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</html>