<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_angajat = $_POST["id_angajat"];
    $id_departament = $_POST["id_departament"];
    $nume_ang = $_POST["nume_ang"];
    $prenume_ang = $_POST["prenume_ang"];
    $email_ang = $_POST["email_ang"];
    $numar_telefon = $_POST["numar_telefon"];
    $salariu = $_POST["salariu"];
    $data_angajare = $_POST["data_angajare"];

    try {
        require_once '../dbh.inc.php';

        $query = "UPDATE angajat 
                  SET id_departament = :id_departament, 
                      nume_ang = :nume_ang, 
                      prenume_ang = :prenume_ang, 
                      email_ang = :email_ang, 
                      numar_telefon = :numar_telefon, 
                      salariu = :salariu, 
                      data_angajare = :data_angajare 
                  WHERE id_angajat = :id_angajat;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_angajat", $id_angajat);
        $stmt->bindParam(":id_departament", $id_departament);
        $stmt->bindParam(":nume_ang", $nume_ang);
        $stmt->bindParam(":prenume_ang", $prenume_ang);
        $stmt->bindParam(":email_ang", $email_ang);
        $stmt->bindParam(":numar_telefon", $numar_telefon);
        $stmt->bindParam(":salariu", $salariu);
        $stmt->bindParam(":data_angajare", $data_angajare);
        $stmt->execute();

        
        $stmt = null;
        $pdo = null;

        header("Location:../../index.php");
        exit(); 
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location:../../index.php");
    exit(); 
}
?>
