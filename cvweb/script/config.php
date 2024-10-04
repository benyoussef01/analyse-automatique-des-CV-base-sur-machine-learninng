<?php 
    const HOST = "127.0.0.1";
    const USER = "root";
    const PASSWORD = "";
    const DBNAME = "db_cv";

    function getConnection(){
        return mysqli_connect(HOST, USER, PASSWORD, DBNAME);
    }
?>