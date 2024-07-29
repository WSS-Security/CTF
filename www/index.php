<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários do Mês</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            max-width: 1200px;
        }
        h1 {
            color: #333;
        }
        .description {
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .card h2 {
            margin: 10px 0;
            color: #007bff;
            font-size: 20px;
        }
        .card p {
            color: #555;
            margin: 5px 0;
        }
        .card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 5px 10px;
            display: inline-block;
            transition: background-color 0.2s, color 0.2s;
        }
        .card a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Funcionários do Mês</h1>
        <p class="description">Conheça os nossos funcionários destacados do mês! Clique em um dos cartões para ver mais detalhes sobre cada um.</p>
        <div class="cards-container">
            <?php
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "users";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to get the top 5 users
            $sql = "SELECT * FROM users ORDER BY id ASC LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>Email: " . $row["email"] . "</p>";
                    echo "<a href='user.php?id=" . $row["id"] . "'>Ver Detalhes</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nenhum funcionário encontrado.</p>";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
