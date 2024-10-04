<?php 

    //include 'script/config.php';

    function login($username, $password){
        $con = getConnection();
        $sql = "SELECT * FROM users WHERE username = \"".$username."\" AND password = \"".$password."\"";
        $exe = mysqli_query($con, $sql);
        return $exe;
    }


    function register($username, $password, $fname, $lname, $phone, $address, $role){
        $con = getConnection();
        $sql = "INSERT INTO `users`(`fname`, `lname`, `phone`, `address`, `username`, `password`, `role`) VALUES (\"".$fname."\",\"".$lname."\",\"".$phone."\",\"".$address."\",\"".$username."\",\"".$password."\",\"".$role."\")";
        $exe = mysqli_query($con, $sql);
        return $exe;
    }

    function getUserById($id){
        $con = getConnection();
        $sql = "SELECT * FROM users WHERE id = $id";
        $exe = mysqli_fetch_assoc(mysqli_query($con, $sql));
        return $exe;
    }

    function setOffreToUser($offer_id, $user_id){
        $con = getConnection();
        $sql = "UPDATE `users` SET `offre_id`=$offer_id WHERE `id`=$user_id";
        $exe = mysqli_query($con, $sql);
        return $exe;
    }

    function saveCvToUser($path, $user_id){
        $con = getConnection();
        $sql = "UPDATE `users` SET `cv_path`=\"".$path."\" WHERE `id`=$user_id";
        $exe = mysqli_query($con, $sql);
        return $exe;
    }

    function getAllUsers(){
        $con = getConnection();
        $sql = "SELECT * FROM `users`";
        $exe = mysqli_query($con, $sql);
        return $exe;
    }

    function supprimerUser($id){
        $con = getConnection();
        $sql = "DELETE FROM `users` WHERE id = $id";
        $exe = mysqli_query($con, $sql);
        return $exe;
    }