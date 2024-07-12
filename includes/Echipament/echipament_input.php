<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echipament</title>
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

        .navbar a:hover {
            background-color: #0056b3;
        }

        form {
            margin: 0 auto; /* Center the form */
            max-width: 400px; /* Set maximum width for the form */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
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
            width: 225px; /* Adjust the width as needed */
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px auto 0; /* Center the button and adjust margin for spacing */
            display: block; /* Ensure it's a block element to center it horizontally */
        }

        .read-button:hover {
            background-color: #0056b3;
        }

        /* Responsive styling for small screens */
        @media screen and (max-width: 600px) {
            form {
                padding: 15px;
            }
        }

        
    </style>
</head>
<body>

    <!-- Navigation Bar with Back Button -->
    <div class="navbar">
        <a href="../../index.php">Înapoi</a>
    </div>

    <div style="margin-bottom: 20px;"></div> 

    <!-- Add Echipament Form -->
    <form action="echipament_handler.inc.php" method="post">
        <h3>Introduce - Echipament</h3>
        <input type="text" name="nume_echipament" placeholder="Nume Echipament" required>
        <input type="number" name="id_locatie" placeholder="Id Locatie" required>
        <div style="margin-bottom: 10px;"></div>
        <label for="data_start_a">Dată Achiziție:</label>
        <div style="margin-bottom: 10px;"></div>
        <input type="date" name="data_achizitie" placeholder="Data Achizitie" required>
        <button type="submit">Introduce</button>
    </form>

    <div style="margin-bottom: 20px;"></div> 

    <button class="read-button" onclick="window.location.href='echipament_read.php';">Listare Echipament</button>

    <div style="margin-bottom: 20px;"></div> 

    <!-- Update-Echipament Form -->
    <form action="echipament_update.inc.php" method="post">
        <h3>Update - Echipament</h3>
        <input type="number" name="id_echipament" placeholder="Id Echipament" required>
        <input type="text" name="nume_echipament" placeholder="Nume Echipament">
        <input type="number" name="id_locatie" placeholder="Id Locatie">
        <div style="margin-bottom: 10px;"></div>
        <label for="data_start_a">Dată Achiziție:</label>
        <div style="margin-bottom: 10px;"></div>
        <input type="date" name="data_achizitie" placeholder="Data Achizitie">
        <button type="submit">Update</button>
    </form>

    <form action="echipament_delete.php" method="post">
        <h3>Delete - Echipament</h3>
        <h4 style="color: gray;">(Alegeți un parametru după care vreți să stergeți)</h4>
        <input type="number" name="id_echipament" placeholder="Id Echipament">
        <input type="text" name="nume_echipament" placeholder="Nume Echipament">
        <input type="number" name="id_locatie" placeholder="Id Locatie">
        <div style="margin-bottom: 10px;"></div>
        <label for="data_start_a">Dată Achiziție:</label>
        <div style="margin-bottom: 10px;"></div>
        <input type="date" name="data_achizitie" placeholder="Data Achizitie">
        <button type="delete">Delete</button>
    </form>

    <div style="margin-bottom: 20px;"></div> 
    
</body>

</html>
