<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_locatie = $_POST["id_locatie"];
    $strada_locatie = $_POST["strada_locatie"];
    $numar_locatie = $_POST["numar_locatie"];
    $oras = $_POST["oras"];
    $nume_locatie = $_POST["nume_locatie"];

    try {
        require_once "../dbh.inc.php";

        // Separate conditions for better security
        $query = "DELETE FROM locatie WHERE 
                  id_locatie = :id_locatie OR 
                  strada_locatie = :strada_locatie OR 
                  numar_strada = :numar_locatie OR 
                  oras = :oras OR 
                  nume_locatie = :nume_locatie;";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_locatie", $id_locatie);
        $stmt->bindParam(":strada_locatie", $strada_locatie);
        $stmt->bindParam(":numar_locatie", $numar_locatie);
        $stmt->bindParam(":oras", $oras);
        $stmt->bindParam(":nume_locatie", $nume_locatie);
        
        $stmt->execute(); 

        // Log the success or redirect to index.php
        $pdo = null;
        $stmt = null;
        header("Location: ../../index.php");
        exit(); // Ensure that no further code is executed after redirect
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../../index.php");
    exit(); // Ensure that no further code is executed after redirect
}
?>
