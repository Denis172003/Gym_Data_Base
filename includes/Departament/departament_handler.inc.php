<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume_departament = $_POST["nume_departament"];
    $id_locatie = $_POST["id_locatie"];

    try {
        require_once '../dbh.inc.php';

        // Get the maximum id_departament
        $maxIdQuery = "SELECT MAX(id_departament) AS max_id FROM departament;";
        $maxIdStmt = $pdo->query($maxIdQuery);
        $maxIdResult = $maxIdStmt->fetch(PDO::FETCH_ASSOC);

        // Set id_departament to the maximum id_departament + 1
        $id_departament = $maxIdResult['max_id'] + 1;

        $query = "INSERT INTO departament (id_departament, nume_departament, id_locatie) VALUES
                  (:id_departament, :nume_departament, :id_locatie);";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_departament", $id_departament);
        $stmt->bindParam(":nume_departament", $nume_departament);
        $stmt->bindParam(":id_locatie", $id_locatie);
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        header("Location:../../index.php");
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../../index.php");
}
?>
