<?php
$host = "localhost";
$dbname = "bd_denis";
$dbusername = "root";
$dbpassword = "";

$connect = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


$sqlF = "CREATE OR REPLACE VIEW vizualizare_data AS
        SELECT d.id_locatie, d.nume_departament, COUNT(a.id_angajat) as nr_anagajati
        FROM departament d
        JOIN angajat a ON d.id_departament = a.id_departament
        JOIN locatie l ON d.id_locatie = l.id_locatie
        GROUP BY d.id_locatie, d.nume_departament";

$resultF = mysqli_query($connect, $sqlF);

if (!$resultF) {
    die("View creation failed: " . mysqli_error($connect));
}


$viewDataQuery = "SELECT * FROM vizualizare_data";
$viewDataResult = mysqli_query($connect, $viewDataQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
          body {
            font-family: 'Cambria', sans-serif;
            background-image: url('includes/FORMS.jpg');
            background-color: #f4f4f4;
            margin: 0;
            background-size: cover;
            background-position: left;
            background-position-y:10%;
            background-position-x:1%;
            background-repeat: no-repeat;
        }

        .navbar {
            background-color: #343a40;
            padding: 10px;
            text-align: center;
            color: #fff;
        }

        .navbar a {
            background-color: #343a40;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 0 auto; 
            display: inline-block; 
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }


        #content {
            padding: 7%;
            background-color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
    <title>Punctul F Query Result</title>
</head>

<body>

<div class="navbar">
        <a href="index.php">Înapoi</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="content">
                    <h3>Vizualizare pentru a găsi numarul de angajați pentru fiecare departament si locație.</h3>

                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Locatie</th>
                                    <th>Nume Departament</th>
                                    <th>Numarul de angajati</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($viewDataResult) > 0) {
                                    while ($row = mysqli_fetch_array($viewDataResult)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["id_locatie"]; ?></td>
                                            <td><?php echo $row["nume_departament"]; ?></td>
                                            <td><?php echo $row["nr_anagajati"]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="3">Nu au fost găsite rezultate.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
