<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_departament = $_POST["id_departament"];
    $nume_departament = $_POST["nume_departament"];
    $id_locatie = $_POST["id_locatie"];

    try {
        require_once '../dbh.inc.php';

        $query = "UPDATE departament 
                  SET nume_departament = :nume_departament, 
                      id_locatie = :id_locatie 
                  WHERE id_departament = :id_departament;";

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
