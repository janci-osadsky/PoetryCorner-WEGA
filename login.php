<?php
include('includes/udaje.php');
include('includes/functions/funkcie.php');

// Set page title based on the current language
$title = isset($current_language) && $current_language === 'sk' ? "Prihlásenie" : "Login";

include('includes/hlavicka.php');
?>

<div class="login-container">
    <h1><?php echo $current_language === 'sk' ? "Prihlásenie" : "Login"; ?></h1>

    <?php
    require_once 'includes/config/config.php'; // Include the config file

    // Process the login form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        // Validate user credentials
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $_SESSION['level'] = 0;
            $_SESSION['author'] = $username;
            header('Location: publish.php');
            exit();
        } else {
            echo '<p style="color: red;">' . ($current_language === 'sk' ? 
                "Prihlásenie nebolo úspešné. Skúste to znova." : "Login was not successful. Please try again.") . '</p>';
        }
    }
    ?>

    <form method="post" action="">
        <label>
            <?php echo $current_language === 'sk' ? "Používateľské meno:" : "Username:"; ?>
            <input type="text" name="username" required>
        </label><br>
        <label>
            <?php echo $current_language === 'sk' ? "Heslo:" : "Password:"; ?>
            <input type="password" name="password" required>
        </label><br>
        <input type="submit" value="<?php echo $current_language === 'sk' ? "Prihlásiť sa" : "Login"; ?>">
    </form>
</div>

<?php include("includes/pata.php"); ?>
