<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departament</title>
    <style>
         body {
            font-family: 'Cambria', sans-serif;
            background-image: url('../FORMS.jpg');
            background-color: #f4f4f4;
            margin: 0;
            background-size: cover;
            background-position: left;
            background-position-y:10%;
            background-position-x:1%;
            background-repeat: no-repeat;
        }

        .navbar {
            background-color: #212529;
            padding: 10px;
            text-align: center;
            color: #fff;
        }

        .navbar a {
            background-color: #212529;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none;
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
            transition: background 0.25s, border-color 0.25s, color 0.25s;
            background: #f9f9f9;
            outline: none;
        }

        input:focus {
            background: #ffffff;
        }

        input::placeholder {
            color: #bbbbbb;
        }

        button {
            width: 100%;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: 'Arial', sans-serif;
            font-weight: 600;
            font-size: 1.1em;
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
            width: 225px; 
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px auto 0; 
            display: block; 
        }

        .read-button:hover {
            background-color: #0056b3;
        }

        @media screen and (max-width: 600px) {
            form {
                padding: 15px;
            }
        }

        
    </style>
</head>

<body>

    <!-- Navigation Bar Button -->
    <div class="navbar">
        <a href="../../index.php">Înapoi</a>
    </div>

    <div style="margin-bottom: 20px;"></div> 

    <!-- Add Departament Form -->
    <form action="departament_handler.inc.php" method="post">
        <h3>Introduce - Departament</h3>
        <input type="text" name="nume_departament" placeholder="Nume Departament" required>
        <input type="number" name="id_locatie" placeholder="Id Locatie" required>
        <button type="submit">Introduce</button>
    </form>

    <div style="margin-bottom: 20px;"></div> 

    <button class="read-button" onclick="window.location.href='departament_read.php';">Listare Departament</button>

    <div style="margin-bottom: 20px;"></div> 

    <!-- Update-Departament Form -->
    <form action="departament_update.inc.php" method="post">
        <h3>Update Departament</h3>
        <input type="number" name="id_departament" placeholder="Id Departament" required>
        <input type="text" name="nume_departament" placeholder="Nume Departament">
        <input type="number" name="id_locatie" placeholder="Id Locatie">
        <button type="submit">Update</button>
    </form>

    <div style="margin-bottom: 20px;"></div> 

    <!-- Delete-Departament Form -->
    <form action="departament_delete.php" method="post">
        <h3>Delete - Departament</h3>
        <h4 style="color: gray;">(Alegeți un parametru după care vreți să stergeți)</h4>
        <input type="number" name="id_departament" placeholder="Id Departament">
        <input type="text" name="nume_departament" placeholder="Nume Departament">
        <input type="number" name="id_locatie" placeholder="Id Locatie">
        <button type="delete">Delete</button>
    </form>

    <div style="margin-bottom: 20px;"></div> 

</body>

</html>
