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

    

    <form class ="log_reg_form" action="" <?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <fieldset>
            <legend>Bejelentkezés</legend>
            <input type="text" name="login" placeholder="Felhasználónév"><br>
            <input type="password" name="pw" placeholder="Jelszó"><br>
            <label>Bejelentkezve maradok <input type="checkbox" name="keepLogin"></label><br>
            <input type="submit" name="submitLogin" value="Bejelentkezés">
        </fieldset>
    </form>

</body>

</html>