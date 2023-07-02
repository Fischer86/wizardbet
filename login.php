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
    include("header.php");

    session_start();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        require("db.php");
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);

            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            //$password = md5($password);

            $query = "SELECT count(*) FROM users WHERE email = '".$email."' AND password = '".$password."'";
            $result = mysqli_fetch_array(mysqli_query($con, $query));
            $rows = $result['count(*)'];

            echo $rows;

            if ($rows != 0) {
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
            else {
                header("Location: register.php");
            }
        }

        $con->close();
    }
    ?>

    <form action='login.php' method='post'>
        <label for="email">Email : </label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password : </label>
        <input type="text" name="password" id="password" required>
        <a href="forgot_password.php">Mot de passe oublié ?</a>
        <input type="checkbox" id="remember-me">
        <label for="remember-me">Remember me</label>
        <br>
        <button type="submit">Log in</button>
    </form>
    <a href="register.php">Don't have an account ?</a>
</body>
</html>