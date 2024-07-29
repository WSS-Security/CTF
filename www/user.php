<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Funcionário</title>
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
            max-width: 800px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        h1 {
            color: #333;
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }
        .profile-header h1 {
            margin: 0;
            color: #007bff;
        }
        .profile-header p {
            margin: 5px 0;
            color: #555;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #007bff;
            background-color: #f4f4f4;
            border: 1px solid #007bff;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "users";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $id = intval($_GET['id']);
            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div class='profile-header'>";
                echo "<div>";
                echo "<h1>" . htmlspecialchars($row["name"]) . "</h1>";
                echo "<p>Email: " . htmlspecialchars($row["email"]) . "</p>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<p>Usuário não encontrado.</p>";
            }

            $conn->close();
        } else {
            echo "<p>ID do usuário não fornecido.</p>";
        }
        ?>
        <a href="index.php" class="back-button">Voltar à Lista</a>
    </div>
</body>
</html>
