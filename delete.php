<?php

    include ("configura.php");

    $id = $_GET['id'];

    $QL = "DELETE FROM users WHERE usr_id=$id";
    $result = $mysqli_query($mysqli,$QL);

    header("Location: index.php");

    
?>