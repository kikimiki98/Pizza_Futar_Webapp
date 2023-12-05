<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | Register</title>
</head>

<body>
    <?php
    include("topnav/topnav.php");
    ?>

    <form class ="log_reg_form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <fieldset>
            <legend>Regisztráció</legend>
            <label for="login">Felhasználónév</label>
            <input type="text" id="login" name="login"><br>
            <label for="pw1">Jelszó</label>
            <input type="password" name="pw1" id="pw1"><br>
            <label for="pw2">Jelszó mégegyszer</label>
            <input type="password" name="pw2" id="pw2"><br>
            <input type="submit" value="Regisztráció" name="submitReg">
        </fieldset>
    </form>

</body>

</html>