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
if (isset($_POST['submitReg'])) {
    $login = $_POST['login'];
    $pw = $_POST['pw'];

    $hashedPw = password_hash($pw, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password_hash) VALUES ('$login', '$hashedPw')";
    $connDB->query($sql);
}
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

</body>

</html>