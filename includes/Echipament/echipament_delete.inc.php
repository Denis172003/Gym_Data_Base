<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // You can adapt the parameters based on your needs
    $id_echipament = $_POST["id_echipament"];
    $id_locatie = $_POST["id_locatie"];
    $nume_echipament = $_POST["nume_echipament"];
    $data_achizitie = $_POST["data_achizitie"];

    try {
        require_once '../dbh.inc.php';

        // Adjust the SQL query based on the conditions you want to check
        $query = "DELETE FROM echipament 
                  WHERE id_echipament = :id_echipament 
                     OR id_locatie = :id_locatie
                     OR nume_echipament = :nume_echipament
                     OR data_achizitie = :data_achizitie;";
        
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_echipament", $id_echipament);
        $stmt->bindParam(":id_locatie", $id_locatie);
        $stmt->bindParam(":nume_echipament", $nume_echipament);
        $stmt->bindParam(":data_achizitie", $data_achizitie);

        $stmt->execute(); 

        // Properly close the database connection and statement
        $stmt = null;
        $pdo = null;

        header("Location:../../index.php");
        exit(); // Add exit after header to ensure the script stops execution after redirection
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../../index.php");
    exit(); // Add exit after header to ensure the script stops execution after redirection
}
?>
