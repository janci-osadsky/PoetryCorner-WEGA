<?php 
include('includes/udaje.php');
include('includes/functions/funkcie.php');
$title = (isset($current_language) && $current_language === 'sk') ? "Jančiho básnický kút" : "Johnny's Poetry Corner";
include('includes/hlavicka.php');

// Add a back button at the top
echo '<a href="javascript:history.back()" class="btn btn-primary" style="margin-bottom: 20px;">Back</a>';

// Fetch the poem ID from the URL
if (isset($_GET['id'])) {
    $poemID = $_GET['id'];
    displayFull($poemID);
}
?>
