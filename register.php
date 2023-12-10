<?php
session_start();
require('db/dbconnect.php');
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | Register</title>
</head>
<?php
$login = $_POST['login'];
$pw = $_POST['pw'];

// Hash the password
$hashedPw = password_hash($pw, PASSWORD_DEFAULT);

// Check if the username already exists
$checkUsernameQuery = "SELECT username FROM users WHERE username = :login";
$stmtCheck = $connDB->prepare($checkUsernameQuery);
$stmtCheck->bindParam(':login', $login, PDO::PARAM_STR);
$stmtCheck->execute();
?>

<body>
    <?php
    include("topnav/topnav.php");
    ?>

    <form class="log_reg_form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <fieldset>
            <legend>Regisztráció</legend>
            <label for="login">Felhasználónév</label>
            <input type="text" id="login" name="login"><br>
            <label for="pw1">Jelszó</label>
            <input type="password" name="pw" id="pw"><br>
            <input type="submit" value="Regisztráció" name="submitReg">
        </fieldset>
    </form>
    <?php
    if ($stmtCheck->rowCount() > 0) {
        // Username already exists, inform the user
        echo "<p><b>Username '$login' is already taken. Please choose a different username.</b></p>";
    } else {
        // Insert the new user record
        $insertQuery = "INSERT INTO users (username, password_hash) VALUES (:login, :hashedPw)";
        $stmtInsert = $connDB->prepare($insertQuery);
        $stmtInsert->bindParam(':login', $login, PDO::PARAM_STR);
        $stmtInsert->bindParam(':hashedPw', $hashedPw, PDO::PARAM_STR);
        $insertResult = $stmtInsert->execute();

        if ($insertResult) {
            // Registration successful
            echo "<p><b>Registration successful!</b></p>";
        } else {
            // Registration failed, display an error message
            echo "<p><b>Error: " . $stmtInsert->errorInfo()[2] . "</b></p>";
        }
    }
    ?>

</body>

</html>