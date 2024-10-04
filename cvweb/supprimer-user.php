<?php 
    include_once('script/init.php');
    $id = $_GET['id'];
    if(supprimerUser($id)){
        header('location: utilisateurs.php');
    }
