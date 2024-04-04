<?php
session_start();   //otvorenie session
   
//kontrola ci uz bol potvrdeny formular a ci boli vyplnene obidva udaje aj username aj password
if (isset($_POST['login']) && !empty($_POST['username']) 
    && !empty($_POST['password'])) {

    //connect string do DB
    $servername = "localhost";
    $username = "andrejcak3A";
    $password = "andrejcak123.";
    $dbname = "andrejcak3a";
    // Create connection
    $conn = new mysqli($servername, $username, 
        $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //vyber hesla z DB podla usera, ktory sa prihlasuje
    $sql = "SELECT password FROM t_user where username ='".$_POST['username']."'";
    $result = $conn->query($sql);

    //ak vrati select viac ako 0 riadkov, user existuje
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        //if($row["password"]==$_POST['password']) {
        if(password_verify($_POST['password'],$row["password"])) {
            $_SESSION['valid'] = true; //ulozenie session
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $_POST['username'];

            //presmerovanie na dalsiu stranku
            header("Location: welcome.php", true, 301);
            exit();
        } else {
            $error_message = "Wrong password";
        }
    } else {
        $error_message = "Wrong username";
    }

    $conn->close();
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

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

        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"] {
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

        .login-container {
            text-align: center;
        }

        .register-link {
            margin-top: 10px;
        }

        .register-link a {
            text-decoration: none;
            color: #007bff;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
<div class="login-container">
    <h2>Login Form</h2>
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Username" required autofocus><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <div class="register-link">
        <a href="register.php">Register</a>
    </div>
</div>
</body>
</html>
