<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>WizardBet</title>
</head>
<body>

    <?php
        require('db.php');
        include('header.php');
        // When form submitted, check if all fields are filled and insert values into the database.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
 $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $username = $_POST["username"];
            $date = date("Y-m-d");

            $query = "INSERT INTO users (username, password, email, creation_date)
                        VALUES ('$username', '$password', '$email', '$date')";

            if ($con -> query($query) === TRUE) {
                header("Location: index.php");
                exit;
            }
            
        }

        $con->close();
    ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress">
            <input type="password" class="login-input" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>

</body>
</html>