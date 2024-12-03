<?php
include('includes/udaje.php');
include('includes/functions/funkcie.php');

// Set page title based on the current language
$title = isset($current_language) && $current_language === 'sk' ? "Zaregistruj sa teraz!" : "Register now!";

include('includes/hlavicka.php');
?>

<div class="login-container">
    <h1><?php echo $current_language === 'sk' ? "Registrácia" : "Registration"; ?></h1>

    <?php
    require_once 'includes/config/config.php'; // Include the config file

    // Process the registration form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        // Check if the username already exists
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo '<p style="color: red;">' . ($current_language === 'sk' ? 
                "Používateľ už existuje. Skúste to znova." : "User already exists. Please try again.") . '</p>';
        } else {
            // Insert the new user
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['level'] = 0;
                $_SESSION['author'] = $username;
                header('Location: publish.php');
                exit();
            } else {
                echo '<p style="color: red;">Error: ' . $conn->error . '</p>';
            }
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
        <input type="submit" value="<?php echo $current_language === 'sk' ? "Zaregistrovať sa" : "Register"; ?>">
    </form>
</div>

<?php include("includes/pata.php"); ?>
