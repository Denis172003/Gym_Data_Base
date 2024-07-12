<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_locatie = $_POST["id_locatie"];
    $id_client = $_POST["id_client"];
    $data_start_a = $_POST["data_start_a"];
    $pret_a = $_POST["pret_a"];

    try {
        require_once '../dbh.inc.php';

        $query = "UPDATE abonament 
                  SET id_locatie = :id_locatie, 
                      id_client = :id_client, 
                      data_start_a = :data_start_a, 
                      pret_a = :pret_a 
                  WHERE id_abonament = :id_abonament;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_locatie", $id_locatie);
        $stmt->bindParam(":id_client", $id_client);
        $stmt->bindParam(":data_start_a", $data_start_a);
        $stmt->bindParam(":pret_a", $pret_a);
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
