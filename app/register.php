<?php
$servername = "localhost";
$username = "andrejcak3A";
$password = "andrejcak123.";
$dbname = "andrejcak3a";

// Připojení k databázi
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Funkce pro vložení nového záznamu do databáze
function insertUser($conn, $meno, $heslo, $email) {
    $sql = $conn->prepare("INSERT INTO t_user (username, password, email) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $meno, $heslo, $email);
    
    if ($sql->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql->close();
}

// Kontrola existence uživatele
function checkUserExists($conn, $meno) {
    $sql = $conn->prepare("SELECT * FROM t_user WHERE username = ?");
    $sql->bind_param("s", $meno);
    $sql->execute();
    $result = $sql->get_result();
    $sql->close();
    return $result->num_rows > 0;
}

// Zpracování formuláře
if(isset($_POST['submit'])) {
    $meno = $_POST['username'];
    $heslo = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    if (!checkUserExists($conn, $meno)) {
        insertUser($conn, $meno, $heslo, $email);
    } else {
        $errorMessage = "User with this username already exists.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration form</title>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4caf50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error-message {
      color: red;
      margin-top: 10px;
      text-align: center;
    }

    .form-container p {
      text-align: center;
    }

    .form-container a {
      text-decoration: none;
      color: #007bff;
    }

    .form-container a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

<div class="form-container">
    <h2>Registration Form</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required autofocus><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="submit" name="submit" value="Register">
    </form>
    <div class="error-message"><?php if(isset($errorMessage)) { echo $errorMessage; } ?></div> <!-- Výpis chybové zprávy -->
    <p>Already registered? <a href="index.php">Login here</a>.</p>
</div>

</body>
</html>
