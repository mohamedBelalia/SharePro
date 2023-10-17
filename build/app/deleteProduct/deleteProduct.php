<?php
session_start();
    require_once('../dbh.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM productstable WHERE id = :id;";

        $statment = $pdo->prepare($query);
        $statment->bindParam(':id' , $id);

        $statment->execute();

        $_SESSION['productDeleted'] = "Your Product Deleted Successfully!";
        header('location: ../index.php');
    }

?>