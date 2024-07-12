<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

    <style>
        /* Your existing styles remain unchanged */

        body {
            margin: 20px;
            background-color: white;
        }
    </style>

    <title>DataTable | devRasen</title>
</head>

<body>
    <!-- Main Content -->
    <div class="container p-3 my-5 bg-light border border-primary">
        <!-- DataTable Code starts -->
        <?php
        try {
            require_once '../dbh.inc.php';

            $query = "SELECT * FROM echipament";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if there are any rows
            if ($result) {
                // Display the data in a DataTable
                echo '<table id="example" class="table table-striped nowrap" style="width:100%">';
                echo "<thead><tr><th>ID_ECHIPAMENT</th><th>ID_LOCATIE</th><th>NUME_ECHIPAMENT</th><th>DATA_ACHIZITIE</th></tr></thead><tbody>";

                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id_echipament'] . "</td>";
                    echo "<td>" . $row['id_locatie'] . "</td>";
                    echo "<td>" . $row['nume_echipament'] . "</td>";
                    echo "<td>" . $row['data_achizitie'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "No records found.";
            }

            $pdo = null;
            $stmt = null;
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
        ?>
        <!-- DataTable JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

        <!-- Custom JS -->
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </div>
</body>

</html>