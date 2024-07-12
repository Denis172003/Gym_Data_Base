<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produs = $_POST["id_produs"];
    $id_departament = $_POST["id_departament"];
    $id_promotie = $_POST["id_promotie"];
    $gramaj = $_POST["gramaj"];
    $valoare_nutritionala = $_POST["valoare_nutritionala"];

    try {
        require_once '../dbh.inc.php';


        $query = "DELETE FROM produs 
                  WHERE id_produs = :id_produs 
                     OR id_departament = :id_departament 
                     OR id_promotie = :id_promotie 
                     OR gramaj = :gramaj 
                     OR valoare_nutritionala = :valoare_nutritionala;";

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
