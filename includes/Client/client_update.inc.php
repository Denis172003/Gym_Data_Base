<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_client = $_POST["id_client"];
    $nume_client = $_POST["nume_client"];
    $prenume_client = $_POST["prenume_client"];
    $email_client = $_POST["email_client"];

    try {
        require_once '../dbh.inc.php';

        $query = "UPDATE client 
                  SET nume_client = :nume_client, 
                      prenume_client = :prenume_client, 
                      email_client = :email_client 
                  WHERE id_client = :id_client;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_client", $id_client);
        $stmt->bindParam(":nume_client", $nume_client);
        $stmt->bindParam(":prenume_client", $prenume_client);
        $stmt->bindParam(":email_client", $email_client);
        $stmt->execute();

        // Properly close the database connection and statement
        $stmt = null;
        $pdo = null;

        header("Location:../../index.php");
        exit(); // Add exit after header to ensure script stops execution after redirection
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../../index.php");
    exit(); // Add exit after header to ensure script stops execution after redirection
}
?>
