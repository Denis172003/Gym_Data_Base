<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_departament = $_POST["id_departament"];
    $nume_departament = $_POST["nume_departament"];
    $id_locatie = $_POST["id_locatie"];

    try {
        require_once "../dbh.inc.php";

        // Separate conditions for better security
        $query = "DELETE FROM departament WHERE 
                  id_departament = :id_departament OR 
                  nume_departament = :nume_departament OR 
                  id_locatie = :id_locatie;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_departament", $id_departament);
        $stmt->bindParam(":nume_departament", $nume_departament);
        $stmt->bindParam(":id_locatie", $id_locatie);

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
