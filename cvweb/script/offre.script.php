<?php 
    function getOffres(){
        $con = getConnection();
        $sql = "SELECT * FROM offres";
        $exe = mysqli_query($con , $sql);
        return $exe;
    }

    function getOffreById($offre_id){
        $con = getConnection();
        $sql = "SELECT * FROM offres WHERE id = $offre_id";
        return mysqli_fetch_assoc(mysqli_query($con, $sql));
    }

    function ajouterOffre($libelle){
        $con = getConnection();
        $sql = "INSERT INTO `offres`(`libelle`) VALUES (\"".$libelle."\")";
        return mysqli_query($con, $sql);
    }

    function supprimerOffre($id){
        $con = getConnection();
        $sql = "DELETE FROM `offres` WHERE id = $id";
        return mysqli_query($con, $sql);
    }
   