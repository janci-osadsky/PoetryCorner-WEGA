<?php 
include('includes/udaje.php');
include('includes/functions/funkcie.php');
$title = ($current_language === 'sk') ? "KONTAKTUJ MA!" : "CONTACT ME!";

include('includes/hlavicka.php');
?>
<div class="container text-center mt-5">
    <h1><?php echo ($current_language === 'sk') ? "Sledujte ma na Instagrame!" : "Follow me on Instagram!"; ?></h1>
    <a href="https://www.instagram.com/janci_159?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="btn btn-primary" style="font-size: 1.5em; padding: 10px 20px;">
        <i class="fab fa-instagram"></i> <?php echo ($current_language === 'sk') ? "Instagram" : "Instagram"; ?>
    </a>
    <p class="mt-3"><?php echo ($current_language === 'sk') ? "Pridajte sa k mojej komunite a sledujte moje najnovšie príspevky!" : "Join my community and keep up with my latest posts!"; ?></p>
    <p class="mt-3"><?php echo ($current_language === 'sk') ? "Neváhajte mi napísať!" : "Feel free to reach out!"; ?></p>
    <a href="mailto:osadsky2@uniba.sk" class="btn btn-primary" style="font-size: 1.5em; padding: 10px 20px;">
        <i class="fas fa-envelope"></i> <?php echo ($current_language === 'sk') ? "Napísať email" : "Send Email"; ?>
    </a>
</div>
<?php

include('includes/pata.php')?>