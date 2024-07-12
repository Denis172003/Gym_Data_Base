<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_locatie = $_POST["id_locatie"];
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
                  WHERE id_locatie = :id_locatie;";
                  
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(":id_locatie", $id_locatie);
        $stmt->bindparam(":strada_locatie", $strada_locatie);
        $stmt->bindParam(":numar_strada", $numar_strada);
        $stmt->bindparam(":oras", $oras);
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
