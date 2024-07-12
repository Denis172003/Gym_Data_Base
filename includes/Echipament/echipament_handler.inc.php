<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_echipament = $_POST["id_echipament"];
    $id_locatie = $_POST["id_locatie"];
    $nume_echipament = $_POST["nume_echipament"];
    $data_achizitie = $_POST["data_achizitie"];

    try {
        require_once '../dbh.inc.php';

        // Get the maximum id_echipament
        $maxIdQuery = "SELECT MAX(id_echipament) AS max_id FROM echipament;";
        $maxIdStmt = $pdo->query($maxIdQuery);
        $maxIdResult = $maxIdStmt->fetch(PDO::FETCH_ASSOC);

        // Set id_echipament to the maximum id_echipament + 1
        $id_echipament = $maxIdResult['max_id'] + 1;

        $query = "INSERT INTO echipament (id_echipament, id_locatie, nume_echipament, data_achizitie) VALUES
        (:id_echipament, :id_locatie, :nume_echipament, :data_achizitie);";
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
        exit(); // Add exit after header to ensure script stops execution after redirection
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../../index.php");
    exit(); // Add exit after header to ensure script stops execution after redirection
}
?>
