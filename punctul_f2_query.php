<?php
$host = "localhost";
$dbname = "bd_denis";
$dbusername = "root";
$dbpassword = "";

$connect = mysqli_connect($host, $dbusername, $dbpassword, $dbname);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE OR REPLACE VIEW vizualizare_client_loc AS
        SELECT l.nume_locatie, c.nume_client, a.data_start_a
        FROM
            locatie l 
        JOIN abonament a ON l.id_locatie = a.id_locatie
        JOIN client c ON a.id_client = c.id_client
        WHERE LOWER(c.nume_client) LIKE 'g%'
        GROUP BY l.nume_locatie, c.nume_client, a.data_start_a";

mysqli_query($connect, $sql);

$sql_punctul_d = "SELECT
                    vcl.nume_locatie AS location_name,
                    vcl.nume_client AS customer_name,
                    vcl.data_start_a AS subscription_start_date
                FROM
                    vizualizare_client_loc vcl";

$result_punctul_d = mysqli_query($connect, $sql_punctul_d);
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

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
    <title>Punctul D</title>
</head>

<body>

<div class="navbar">
        <a href="index.php">Înapoi</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="content">
                    <h3 style="margin-left: 20px;">Afișați numele locației, numele clientului și data de început a abonamentului pentru fiecare </h3>
                    <h3> client al cărui nume început cu litera 'G'. </h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nume Locatie</th>
                                    <th>Nume Client</th>
                                    <th>Data Inceput Abonament</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result_punctul_d) > 0) {
                                    while ($row = mysqli_fetch_array($result_punctul_d)) {
                                ?>
                                        <tr>
                                            <td><?php echo $row["location_name"]; ?></td>
                                            <td><?php echo $row["customer_name"]; ?></td>
                                            <td><?php echo $row["subscription_start_date"]; ?></td>
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
