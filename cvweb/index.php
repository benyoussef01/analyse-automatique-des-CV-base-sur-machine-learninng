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
    <title>Se connecter</title>
</head>

<body style="background-image: url('https://www.callcentrehelper.com/images/stories/2006/06/cv-pile-760.jpg');">
    <div class="container" style="margin-top: 225px">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                       
                        &nbsp;Connexion
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_POST['connect'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $user = mysqli_fetch_assoc(login($username, $password));
                            $role = $user['role'];
                            if ($role === "ROLE_CANDIDAT") {
                                session_start();
                                $_SESSION['connecte'] = $user;
                                header('location: candidat.php');
                            } else if ($role === "ROLE_RECRUTEUR") {
                                session_start();
                                $_SESSION['connecte'] = $user;
                                header('location: recruteur.php');
                            } else if ($role === "ROLE_ADMIN") {
                                session_start();
                                $_SESSION['connecte'] = $user;
                                header('location: admin.php');
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-4  text-center">
                            <img src="sidentifier.png" height="150px" width="150px" class="img">
                            </div>
                            <div class="col-md-8">
                                <form action="" method="post" class="mb-3">
                                    <div class="form-group">
                                        <label for="username">Nom d'utilisateur</label>
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                    <button type="submit" name="connect" class="btn btn-sm btn-primary btn-block">se Connecter</button>
                                </form>
                                <a href="register.php" class="mt-5 text-center">Si vous n'avez pas un compte ? </a></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const btn = document.getElementById('btn');
    btn.addEventListener('click', function() {
        const keyword = document.getElementById('keyword');
        const cvType = document.getElementById('cvType');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                console.log(xhttp.responseText);
            }
        };
        xhttp.open("GET", `http://127.0.0.1:5000/?cvType=${cvType}&motCle=${keyword}`, true);
        xhttp.send();
        /*const xhr = new XMLHttpRequest();
        xhr.open('GET', `http://127.0.0.1:5000/?cvType=${cvType.value}&motCle=${keyword.value}`)
        xhr.onload = function(){
            if(xhr.status == 200 && xhr.onreadystatechange == 4){
                console.log(xhr.responseText);
            }
        }
        xhr.send();*/
    });
</script>

</html>