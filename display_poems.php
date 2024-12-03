<?php
include('includes/udaje.php');
include('includes/functions/funkcie.php');

$poemType = isset($_GET['poem_type']) ? ucfirst(str_replace("_", " ", $_GET['poem_type'])) : "";
$title = isset($current_language) && $current_language === 'sk' ? 
    "{$poemType} Básne" : "{$poemType} Poems";

include('includes/hlavicka.php');
?>

<div class="container">
    <a href="javascript:history.back()" class="btn btn-primary mb-3">
        <?php echo $current_language === 'sk' ? "Späť" : "Back"; ?>
    </a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $sql = empty($_GET['poem_type']) ? 
            "SELECT * FROM poems" : 
            "SELECT * FROM poems INNER JOIN " . $_GET['poem_type'] . " ON poems.ID = " . $_GET['poem_type'] . ".poemID";

        // Include database configuration
        require_once 'includes/config/config.php';

        // Fetch and display poems
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                displayPart($row['ID']);
            }
        } else {
            echo '<p class="text-center">';
            echo $current_language === 'sk' ? 
                "Nenašli sa žiadne básne pre vybraný typ." : 
                "No poems found for the selected type.";
            echo '</p>';
        }

        $conn->close();
    }
    ?>
</div>

<?php include('includes/pata.php'); ?>
