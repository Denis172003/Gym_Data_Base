<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_promotie = $_POST["id_promotie"];
    $strada_locatie = $_POST["strada_locatie"];
    $numar_strada = $_POST["numar_locatie"];
    $oras = $_POST["oras"];
    $nume_locatie = $_POST["nume_locatie"]; 

    try {
        require_once '../dbh.inc.php';
        
        $query = "UPDATE locatie 
                  SET strada_locatie = :strada_locatie, 
                      numar_strada = :numar_strada, 
                      oras = :oras, 
                      nume_locatie = :nume_locatie 
                  WHERE id_promotie = :id_promotie;";
                  
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_promotie", $id_promotie);
        $stmt->bindParam(":strada_locatie", $strada_locatie);
        $stmt->bindParam(":numar_strada", $numar_strada);
        $stmt->bindParam(":oras", $oras);
        $stmt->bindParam(":nume_locatie", $nume_locatie);
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
