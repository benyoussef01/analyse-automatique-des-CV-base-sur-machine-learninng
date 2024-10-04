<?php 
include_once('script/init.php');
    session_start();
  
    $nom = $_SESSION['connecte']['fname'];
    $prenom = $_SESSION['connecte']['lname'];
    $target_dir = "C:\\Users\\Samiya RSI\\Desktop\\PFE\\pdf\\";
    $target_dir = 'pdf\\';
    $filename   = 'cv-'.$nom.'-'.$prenom.'-'.uniqid().'.pdf';
    $target_file = $target_dir . $filename;
    $offre_id  = $_GET['offre_id'];
    $candidat_id  = $_GET['id'];

    if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
        $_SESSION['msg'] = "votre cv a été envoyé";
        saveCvToUser($filename, $candidat_id);
        postuler($offre_id, $candidat_id);
        
        header('location: candidat.php');
      } else {
        die("ko");
      }
    var_dump($_FILES['cv']);