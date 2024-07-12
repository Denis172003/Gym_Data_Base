<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_promotie = $_POST["id_promotie"];
    $data_inceput = $_POST["data_inceput"];
    $data_final = $_POST["data_final"];
    $procent_reducere = $_POST["procent_reducere"];

    try {
        require_once '../dbh.inc.php';

        $query = "UPDATE promotie 
                  SET data_inceput = :data_inceput, 
                      data_final = :data_final, 
                      procent_reducere = :procent_reducere 
                  WHERE id_promotie = :id_promotie;";

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
