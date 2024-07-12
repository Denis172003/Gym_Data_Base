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
            background-image: url('INDEX_BG.jpg');
            background-color: #f4f4f4;
            margin: 0;
            background-size: cover;
            background-position: center;
            background-position-y:5%;
            background-repeat: no-repeat;
}

        /

        .navbar-dark .navbar-nav .nav-link {
            color: #fff; /* Text color */
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #fff; /* Toggler icon color */
        }

        .navbar-dark .navbar-nav .active > .nav-link {
            background-color: #007bff; /* Active link background color */
        }

        #wrapper {
            width: 70%;
            margin: 0 auto;
        }

        #header {
            background-color: #C1D1FD;
            padding: 3%;
        }

        #content {
            padding: 7%;
            background-color: #fff;
        }

        #footer {
            background-color: #C1D1FD;
            padding: 2%;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        h3 {
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
        }

        button[type="submit"]:hover {
            background-color: #4ca049;
        }

        button[type="delete"] {
            background-color: #e74c3c;
            color: #fff;
        }

        button[type="delete"]:hover {
            background-color: #c0392b;
        }

        .read-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        /* Style the Punctul C button similarly to the Select Table button */
        .punctul-c-button,
        .punctul-d-button,
        .punctul-fi-button,
        .punctul-fii-button {
            background-color: #343a40;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        /* Center-align the navbar items */
        .navbar-nav {
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
    <title>Document</title>
</head>

<body>
    <form id="form1" runat="server">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Navigation bar -->
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <!-- Add dropdown menu for tables -->
                                    <li class="nav-item dropdown">
                                    <div style="margin-bottom: 3px;"></div> <!-- Add space here -->
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Selectați Tabelul
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="includes/Abonament/abonament_input.php">Abonament</a></li>
                                            <li><a class="dropdown-item" href="includes/Angajat/angajat_input.php">Angajat</a></li>
                                            <li><a class="dropdown-item" href="includes/Client/client_input.php">Client</a></li>
                                            <li><a class="dropdown-item" href="includes/Departament/departament_input.php">Departament</a></li>
                                            <li><a class="dropdown-item" href="includes/Echipament/echipament_input.php">Ehipament</a></li>
                                            <li><a class="dropdown-item" href="includes/Locatie/locatie_input.php">Locatie</a></li>
                                            <li><a class="dropdown-item" href="includes/Produs/produs_input.php">Produs</a></li>
                                            <li><a class="dropdown-item" href="includes/Promotie/promotie_input.php">Promotie</a></li>
                                        </ul>
                                    </li>
                                    <!-- Add button for Punctul C -->
                                    <li class="nav-item">
                                        <a class="nav-link punctul-c-button" href="punctul_c_query.php">
                                            Punctul C
                                        </a>
                                    </li>
                                    <!-- Add button for Punctul D -->
                                    <li class="nav-item">
                                        <a class="nav-link punctul-d-button" href="punctul_d_query.php">
                                            Punctul D
                                        </a>
                                    </li>
                                    <!-- Modify existing button for Punctul F and rename it to Punctul FI -->
                                    <li class="nav-item">
                                        <a class="nav-link punctul-fi-button" href="punctul_f_query.php">
                                            Punctul F 1 <!-- Updated button text -->
                                        </a>
                                    </li>
                                    <!-- Add button for Punctul FII -->
                                    <li class="nav-item">
                                        <a class="nav-link punctul-c-button" href="punctul_f2_query.php">
                                            Punctul F 2
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
