<?php
session_start();
require('db/dbconnect.php');
$cartCount = isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0;
$loggedInUserName = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/addToCart.js"></script>
</head>

<body>
    <?php
    include("topnav/topnav.php");
    ?>



    <form class="log_reg_form" action="" <?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <fieldset>
            <legend>Bejelentkezés</legend>
            <input type="text" name="login" placeholder="Felhasználónév"><br>
            <input type="password" name="pw" placeholder="Jelszó"><br>
            <input type="submit" name="submitLogin" value="Bejelentkezés">
        </fieldset>
    </form>

</body>
<?php
// Dummy function to simulate user login
function loginUser($username, $password)
{
    global $connDB;

    // Fetch the hashed password from the database
    $sql = "SELECT user_id, username, password_hash FROM users WHERE username=:username";

    // Use prepared statements to avoid SQL injection
    $stmt = $connDB->prepare($sql);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $storedHashedPassword = $result['password_hash'];

        // Verify the entered password against the stored hashed password
        if (password_verify($password, $storedHashedPassword)) {
            // Passwords match, login successful
            return array('status' => true, 'user_id' => $result['user_id']);
        }
    }

    // Either the username doesn't exist or the password is incorrect
    return array('status' => false, 'user_id' => null);
}


// Handle login form submission
if (isset($_POST['submitLogin'])) {
    $loginUsername = $_POST['login'];
    $loginPassword = $_POST['pw'];

    $loginResult = loginUser($loginUsername, $loginPassword);
    // Add any necessary validation and error handling here

    if ($loginResult['status']) {
        // Login successful
        $_SESSION['user']['username'] = $loginUsername;
        $_SESSION['user']['user_id'] = $loginResult['user_id'];

        // Redirect to the dashboard or another page after successful login
        header('Location: index.php');
        exit();
    } else {
        // Display an error message or handle unsuccessful login
        $loginError = "Invalid username or password.";
    }
}
?>

</html>