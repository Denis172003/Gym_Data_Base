<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_client = $_POST["id_client"];
    $nume_client = $_POST["nume_client"];
    $prenume_client = $_POST["prenume_client"];
    $email_client = $_POST["email_client"];

    try {
        require_once '../dbh.inc.php';

        
        $query = "DELETE FROM client 
                  WHERE id_client = :id_client 
                     OR nume_client = :nume_client
                     OR prenume_client = :prenume_client
                     OR email_client = :email_client;";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_client", $id_client);
        $stmt->bindParam(":nume_client", $nume_client);
        $stmt->bindParam(":prenume_client", $prenume_client);
        $stmt->bindParam(":email_client", $email_client);

        $stmt->execute(); 

        
        $stmt = null;
        $pdo = null;

        header("Location:../../index.php");
        exit(); 
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../../index.php");
    exit(); 
}
?>
