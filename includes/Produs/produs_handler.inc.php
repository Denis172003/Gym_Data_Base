<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_departament = $_POST["id_departament"];
    $id_promotie = $_POST["id_promotie"];
    $gramaj = $_POST["gramaj"];
    $valoare_nutritionala = $_POST["valoare_nutritionala"];

    try {
        require_once '../dbh.inc.php';

        // Get the maximum id_produs
        $maxIdQuery = "SELECT MAX(id_produs) AS max_id FROM produs;";
        $maxIdStmt = $pdo->query($maxIdQuery);
        $maxIdResult = $maxIdStmt->fetch(PDO::FETCH_ASSOC);

        // Set id_produs to the maximum id_produs + 1
        $id_produs = $maxIdResult['max_id'] + 1;

        $query = "INSERT INTO produs (id_produs, id_departament, id_promotie, gramaj, valoare_nutritionala) VALUES
        (:id_produs, :id_departament, :id_promotie, :gramaj, :valoare_nutritionala);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_produs", $id_produs);
        $stmt->bindParam(":id_departament", $id_departament);
        $stmt->bindParam(":id_promotie", $id_promotie);
        $stmt->bindParam(":gramaj", $gramaj);
        $stmt->bindParam(":valoare_nutritionala", $valoare_nutritionala);

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
