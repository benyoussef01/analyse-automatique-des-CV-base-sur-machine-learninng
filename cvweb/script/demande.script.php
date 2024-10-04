<?php 

   // include 'script/config.php';

    function postuler($offre_id, $candidat_id){
        $con = getConnection();
        $sql = "INSERT INTO `postules`(`offre_id`, `candidat_id`, `status`) VALUES ($offre_id,$candidat_id,'en_cours')";
        $exe = mysqli_query($con, $sql);
        return $exe;
    }

    function getCvsByRecruteur($offre_id){
        $con = getConnection();
        $sql = "SELECT * FROM postules WHERE offre_id = $offre_id";
        $exe = mysqli_query($con, $sql);
        return $exe;

    }


  