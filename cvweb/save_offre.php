<?php 
    include_once('script/init.php');
    session_start();
    $connecte   = $_SESSION['connecte'];
    $id_connecte = $connecte['id'];
    $offer_id    = $_POST['offre'];
    if(setOffreToUser($offer_id,$id_connecte)){
        $connecte['offre_id'] = $offer_id;
        $_SESSION['connecte'] = $connecte;
        header('location: recruteur.php');
    }