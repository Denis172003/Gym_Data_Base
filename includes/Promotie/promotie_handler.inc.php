<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_inceput = $_POST["data_inceput"];
    $data_final = $_POST["data_final"];
    $procent_reducere = $_POST["procent_reducere"];

    try {
        require_once '../dbh.inc.php';

        // Get the maximum id_promotie
        $maxIdQuery = "SELECT MAX(id_promotie) AS max_id FROM promotie;";
        $maxIdStmt = $pdo->query($maxIdQuery);
        $maxIdResult = $maxIdStmt->fetch(PDO::FETCH_ASSOC);

        // Set id_promotie to the maximum id_promotie + 1
        $id_promotie = $maxIdResult['max_id'] + 1;

        $query = "INSERT INTO promotie (id_promotie, data_inceput, data_final, procent_reducere) VALUES
        (:id_promotie, :data_inceput, :data_final, :procent_reducere);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_promotie", $id_promotie);
        $stmt->bindParam(":data_inceput", $data_inceput);
        $stmt->bindParam(":data_final", $data_final);
        $stmt->bindParam(":procent_reducere", $procent_reducere);

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
