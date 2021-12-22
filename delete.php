<?php

    if(!empty($_GET['id']))
    {
        require_once 'db_connect.php';

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM usuario WHERE id=$id";

        $result = $connect->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuario WHERE id = $id";
            $resultDelete = $connect->query($sqlDelete);
        }
    }
    header('Location: usuarios.php');
   
?>