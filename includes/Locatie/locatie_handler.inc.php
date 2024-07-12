<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $strada_locatie = $_POST["strada_locatie"];
    $numar_locatie = $_POST["numar_locatie"];
    $oras = $_POST["oras"];
    $nume_locatie = $_POST["nume_locatie"];

    try {
        require_once '../dbh.inc.php';

        // Get the maximum id_locatie
        $maxIdQuery = "SELECT MAX(id_locatie) AS max_id FROM locatie;";
        $maxIdStmt = $pdo->query($maxIdQuery);
        $maxIdResult = $maxIdStmt->fetch(PDO::FETCH_ASSOC);

        // Set is_locatie to the maximum id_locatie + 1
        $is_locatie = $maxIdResult['max_id'] + 1;

        $query = "INSERT INTO locatie (id_locatie, strada_locatie, numar_strada, oras, nume_locatie) VALUES
        (:id_locatie, :strada_locatie, :numar_locatie, :oras, :nume_locatie);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_locatie", $is_locatie);
        $stmt->bindParam(":strada_locatie", $strada_locatie);
        $stmt->bindParam(":numar_locatie", $numar_locatie);
        $stmt->bindParam(":oras", $oras);
        $stmt->bindParam(":nume_locatie", $nume_locatie);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        // Use $is_locatie as needed in your code

        header("Location:../../index.php");
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../../index.php");
}
?>
