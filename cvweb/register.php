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
    <title>Inscription</title>
</head>

<body style ="background-color:#dbdbba;">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">Inscription</div>
                    <div class="card-body">
                        <?php
                        if (isset($_POST['register'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $lname = $_POST['lname'];
                            $fname = $_POST['fname'];
                            $address = $_POST['address'];
                            $phone = $_POST['phone'];
                            $role = $_POST['role'];
                            if(register($username,$password, $fname, $lname, $phone, $address, $role)){
                                header('location: index.php');
                            }
                            
                            
                        }
                        ?>
                        <form action="" method="post" class="mb-3">
                            <div class="form-group">
                                <label for="username">Nom d'utilisateur</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="lname">Nom</label>
                                <input type="text" class="form-control" name="lname" id="lname">
                            </div>
                            <div class="form-group">
                                <label for="fname">Prénom</label>
                                <input type="text" class="form-control" name="fname" id="fname">
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="number" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="role">Je suis : </label>
                                <select class="form-control" name="role">
                                    <option value="ROLE_CANDIDAT">un candidat</option>
                                    <option value="ROLE_RECRUTEUR">un recruteur</option>
                                </select>
                            </div>
                            <button type="submit" name="register" class="btn btn-sm btn-primary btn-block">Inscrire</button>
                        </form>
                        <a href="index.php" class="mt-5 text-center">vous avez un compte ? </a></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>