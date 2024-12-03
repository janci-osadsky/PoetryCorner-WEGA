<?php 
include('includes/udaje.php');
include('includes/functions/funkcie.php');
$title = (isset($current_language) && $current_language === 'sk') ? "Vitajte v Jančiho básnickom rohu" : "Welcome to Johnny's Poetry Corner";
include('includes/hlavicka.php');
?>

<section class="poem-of-day py-5">
    <?php 
    displayRandom(1, ($current_language === 'sk') ? "Báseň dňa" : "Poem of the day"); 
    ?>                  
</section>

<div class="container">
    <p>
        <?php echo ($current_language === 'sk') ? 
        "Zbierka veršov od srdca a poetických vyjadrení duše" : 
        "A collection of heartfelt verses and poetic expressions"; ?>
    </p>
    <a href="categories.php" class="btn btn-primary btn-lg">
        <?php echo ($current_language === 'sk') ? "Preskúmať básne" : "Explore Poems"; ?>
    </a>
</div>

<section class="featured py-5">
    <?php
    displayRandom(3, ($current_language === 'sk') ? "Vybrané básne" : "Featured Poems");
    ?>
</section>

<!-- Poetry Info Section RIGHT -->
<div class="fixed-right mb-4" style="max-width: 25%; position: fixed; top: 340px;" id="poetry-info">
    <p class="text-muted" style="text-align: center;">
        <strong>
            <?php echo ($current_language === 'sk') ? 
            "Dôležité info o poézii:" : "Key Points About Poetry:"; ?>
        </strong>
    </p>
    <ul class="text-muted" style="text-align: left;">
        <li><?php echo ($current_language === 'sk') ? "Poézia tlmí bolesti a ponúka útechu v ťažkých časoch." : "Poetry alleviates pain and offers solace in difficult times."; ?></li>
        <li><?php echo ($current_language === 'sk') ? "Má terapeutickú moc, ktorá nám pomáha spracovať naše emócie." : "It possesses therapeutic power that helps us process our emotions."; ?></li>
        <li><?php echo ($current_language === 'sk') ? "Poézia nám umožňuje lepšie spoznať samých seba a naše vnútorné prežívanie." : "Poetry allows us to better understand ourselves and our inner experiences."; ?></li>
        <li><?php echo ($current_language === 'sk') ? "Skupinová poetoterapia vytvára priestor pre zdieľanie a spojenie medzi tými, ktorí sa cítia osamelo." : "Group poetry therapy creates a space for sharing and connection among those who feel alone."; ?></li>
    </ul>
</div>
<button type="button" onclick="togglePoetryInfo();" class="btn btn-outline-primary" style="position: fixed; top: 500px; right: 20px; z-index: 1000;">
    <span id="poetry-info-button-text">Minimize</span>
</button>
<script>
    function togglePoetryInfo() {
        var poetryInfo = document.getElementById('poetry-info');
        var poetryInfoButtonText = document.getElementById('poetry-info-button-text');
        if (poetryInfo.style.display === 'none') {
            poetryInfo.style.display = 'block';
            poetryInfoButtonText.textContent = 'Minimize';
        } else {
            poetryInfo.style.display = 'none';
            poetryInfoButtonText.textContent = 'Show';
        }
    }
</script>
<script>
    function checkWindowSize() {
        const poetryInfo = document.getElementById('poetry-info');
        if (window.innerWidth > 768) { // Adjust the width as needed
            poetryInfo.style.display = 'block';
        } else {
            poetryInfo.style.display = 'none';
        }
    }
    window.onload = checkWindowSize;
    window.onresize = checkWindowSize;
</script>

<!-- Login Section -->
<div class="login mb-4" style="position: fixed; top: 10px; left: -150px; z-index: 1000;" id="login-section">
    <div class='login h-100' style="margin: 5px;">
    <?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']): ?>
        <form method="post" action="login.php">
            <h4><?php echo ($current_language === 'sk') ? "Prihlásenie" : "Login"; ?></h4>
            <div class="form-group">
                <label for="username"><?php echo ($current_language === 'sk') ? "Používateľské meno" : "Username"; ?></label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><?php echo ($current_language === 'sk') ? "Heslo" : "Password"; ?></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><?php echo ($current_language === 'sk') ? "Prihlásiť sa" : "Log In"; ?></button>
        </form>
    <?php else: ?>
        <button type="button" onclick="document.getElementById('login-section').style.display='none';" class="btn btn-outline-primary">
            <?php echo ($current_language === 'sk') ? "Minimalizovať" : "Minimize"; ?>
        </button>
    <?php endif; ?>
    </div>
</div>

<button type="button" onclick="toggleLoginSection();" class="btn btn-outline-primary" style="position: fixed; top: 500px; left: 20px; z-index: 1000;">
    <span id="login-section-button-text">Minimize</span>
</button>
<!-- JavaScript Section -->
<script>
    <?php if (isset($_SESSION['author'])): ?>
        document.getElementById('login-section').style.display = 'none';
    <?php endif; ?>
    function toggleLoginSection() {
        var loginSection = document.getElementById('login-section');
        var loginSectionButtonText = document.getElementById('login-section-button-text');
        if (loginSection.style.display === 'none') {
            loginSection.style.display = 'block';
            loginSectionButtonText.textContent = 'Minimize';
        } else {
            loginSection.style.display = 'none';
            loginSectionButtonText.textContent = 'Show';
        }
    }
</script>
<script>
    // Show the div only if the window is wider than a small size
    function checkWindowSize() {
        const loginSection = document.getElementById('login-section');
        if (window.innerWidth > 768) { // Adjust the width as needed
            loginSection.style.display = 'block';
        } else {
            loginSection.style.display = 'none';
        }
    }
    window.onload = checkWindowSize;
    window.onresize = checkWindowSize;
</script>

</body>
<?php
include('includes/pata.php');
?>
