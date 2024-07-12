<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $locatieSearch = $_POST["id_locatiesearch"];
    
        try {
            require_once "includes/dbh.inc.php";
            
            $query = "SELECT * FROM departament WHERE id_locatie = :id_locatiesearch;";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":id_locatiesearch", $locatieSearch);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $pdo = null;
            $stmt = null;
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    } else {
        header("Location: ../index.php");

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/reset.css"> 
    <link rel="stylesheet" href="css/main.css"> 
    <title>Document</title>
</head>

<body>

    <h3>Search Result: </h3>
    <?php
        if (empty($results)) {
            echo "<div>";
            echo "<p>Nu au fost găsite rezultate.</p>";
            echo "</div>"; 
            
            foreach ($results as $row) {
                echo htmlspecialchars($row["numar_strada"]);
                echo htmlspecialchars($row["oras"]);
            }
        }
    ?>
</body>

</html>
