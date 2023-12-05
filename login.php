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

</html><?php
session_start();

require('db/dbconnect.php');

// Dummy function to simulate user registration
function registerUser($username, $password)
{
    // Replace this with your actual database insert logic
    // Example: $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    // $connDB->query($sql);
    // Remember to hash the password before storing it in the database for security
}

// Dummy function to simulate user login
function loginUser($username, $password)
{
    // Replace this with your actual database query logic
    // Example: $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    // $result = $connDB->query($sql);

    // For simplicity, return a boolean indicating success
    // Replace this with your actual logic to verify credentials
    return true;
}

// Handle registration form submission
if (isset($_POST['register'])) {
    $registerUsername = $_POST['registerUsername'];
    $registerPassword = $_POST['registerPassword'];

    // Add any necessary validation and error handling here

    // Register the user
    registerUser($registerUsername, $registerPassword);
}

// Handle login form submission
if (isset($_POST['login'])) {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    // Add any necessary validation and error handling here

    // Simulate user login
    if (loginUser($loginUsername, $loginPassword)) {
        $_SESSION['username'] = $loginUsername;
        // Redirect to the dashboard or another page after successful login
        header('Location: dashboard.php');
        exit();
    } else {
        // Display an error message or handle unsuccessful login
        $loginError = "Invalid username or password.";
    }
}
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
    <div class="overlay">
        <div class="login-container">
            <div class="login-form">
                <h1>Login</h1>
                <?php if (isset($loginError)) : ?>
                    <p class="error"><?php echo $loginError; ?></p>
                <?php endif; ?>
                <form action="" method="post">
                    <label for="loginUsername">Username:</label>
                    <input type="text" id="loginUsername" name="loginUsername" required>

                    <label for="loginPassword">Password:</label>
                    <input type="password" id="loginPassword" name="loginPassword" required>

                    <button type="submit" name="login">Login</button>
                </form>
            </div>

            <div class="register-form">
                <h1>Register</h1>
                <form action="" method="post">
                    <label for="registerUsername">Username:</label>
                    <input type="text" id="registerUsername" name="registerUsername" required>

                    <label for="registerPassword">Password:</label>
                    <input type="password" id="registerPassword" name="registerPassword" required>

                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</htm