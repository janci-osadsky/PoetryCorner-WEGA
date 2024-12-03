<?php 
include('includes/udaje.php');
include('includes/functions/funkcie.php');
include('includes/config/config.php');

if (!isset($_SESSION['level']) || $_SESSION['level'] < 0) {
    die('<p class="text-danger">Access Forbidden</p>'); 
}

$title = (isset($current_language) && $current_language === 'sk') ? 
    "Publikovať novú báseň" : "Publish New Poem";
include('includes/hlavicka.php');
require_once 'includes/config/config.php';
?>

<div class="container mt-5">
    <div class="card poetry-card">
        <div class="card-body">
            <h1 class="card-title text-center"><?php echo $title; ?></h1>
            
            <?php
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $author = $_POST['author'];
                $poem_lang = $_POST['poem_lang'];
                $categories = $_POST['categories'] ?? [];

                // Insert new poem into the database
                $sql = "INSERT INTO poems (name, author, text, date, lang) VALUES ('$title', '$author', '$content', CURDATE(), '$poem_lang')";
                $result = $conn->query($sql);

                if ($result) {
                    $poem_id = $conn->insert_id; // Get the ID of the last inserted poem
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            $sql = "INSERT INTO $category (poemID) VALUES ('$poem_id')";
                            $conn->query($sql);
                        }
                    }
                    echo '<p class="text-success">' . (($current_language === 'sk') ? "Báseň bola úspešne publikovaná!" : "Poem published successfully!") . '</p>';
                } else {
                    echo '<p class="text-danger">Error: ' . $conn->error . '</p>';
                }
            }
            ?>

            <form method="post" action="">
                <div class="form-group text-center">
                    <label><?php echo ($current_language === 'sk') ? "Názov:" : "Title:"; ?></label>
                    <input type="text" name="title" class="form-control" style="width: 40%; margin: 0 auto;" required>
                </div>
                <div class="form-group text-center">
                    <label><?php echo ($current_language === 'sk') ? "Obsah:" : "Content:"; ?></label>
                    <textarea name="content" class="form-control" rows="10" style="width: 90%; margin: 0 auto;" required></textarea>
                </div>
                <div class="form-group text-center">
                    <label><?php echo ($current_language === 'sk') ? "Autor:" : "Author:"; ?></label>
                    <input type="text" name="author" class="form-control" value="<?php echo htmlspecialchars($_SESSION['autor'] ?? ''); ?>" style="width: 50%; margin: 0 auto;" required>
                </div>
                <div class="form-group text-center">
                    <label for="poem_lang"><?php echo ($current_language === 'sk') ? "Jazyk básne" : "Poem Language"; ?></label>
                    <select class="form-control" id="poem_lang" name="poem_lang" style="width: 4.7em; margin: 0 auto;">
                        <option value="en" <?php if ($current_language === 'en') echo 'selected'; ?>>English</option>
                        <option value="sk" <?php if ($current_language === 'sk') echo 'selected'; ?>>Slovak</option>
                    </select>
                </div>
                <div class="form-group text-center">
                    <label for="categories"><?php echo ($current_language === 'sk') ? "Vyberte kategórie" : "Select Categories"; ?></label>
                    <div class="categories-section">
                        <?php
                        // Get list of poem categories from database
                        $sql = "SELECT name FROM category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='checkbox' name='categories[]' value='{$row['name']}' id='{$row['name']}'>";
                                echo "<label class='form-check-label' for='{$row['name']}'>{$row['name']}</label>";
                                echo "</div>";
                            }
                        }
                        
                        ?>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" value="<?php echo ($current_language === 'sk') ? "Publikovať" : "Publish"; ?>" style="margin: 0 auto; display: block;">
                <br>
            </form>
        </div>
    </div>
</div>

<?php include("includes/pata.php"); ?>