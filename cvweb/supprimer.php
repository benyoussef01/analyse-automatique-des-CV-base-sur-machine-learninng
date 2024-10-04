<?php 
    include_once('script/init.php');
    $id = $_GET['id'];
    if(supprimerOffre($id)){
        header('location: admin.php');
    }
