<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navbar-nav ms-auto d-lg-none">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo ($current_language === 'sk') ? 'Menu' : 'Menu'; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="welcome.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Domov' : 'Home'; ?></a></li>
                        <li><a class="dropdown-item" href="categories.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Básne' : 'Poems'; ?></a></li>
                        <li><a class="dropdown-item" href="login.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Prihlásenie' : 'Login'; ?></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="about.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'O autorovi' : 'About author'; ?></a></li>
                        <li><a class="dropdown-item" href="contact.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Kontakt' : 'Contact'; ?></a></li>
                    </ul>
                </li>
            </div>
           
            <li class="nav-item d-none d-lg-block"><a class="nav-link active" href="welcome.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Domov' : 'Home'; ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="categories.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Básne' : 'Poems'; ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="register.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Registrácia' : 'Register'; ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="about.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'O autorovi' : 'About author'; ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="contact.php?lang=<?php echo $current_language; ?>"><?php echo ($current_language === 'sk') ? 'Kontakt' : 'Contact'; ?></a></li>
        </div>
        <!-- Language Switch -->
        <section class="language-switch" style="position: fixed; top: 2px; left: 10px; z-index: 1000;">
            <a href="<?php echo strtok($_SERVER["REQUEST_URI"], '?') . '?lang=' . ($current_language === 'sk' ? 'en' : 'sk'); ?>" class="btn btn-primary" style="width: 6.5em;"><?php echo ($current_language === 'sk') ? 
            'English' : 'Slovenčina'; ?></a>
        </section>
        <section> 
            <div class="text-end" style="position: fixed; top: 2px; right: 10px; z-index: 1000; >
                <?php if (isset($_SESSION['author']) && $_SESSION['author'] !== null): ?>
                    <span class="logged-in-text">Logged in as: <?php echo htmlspecialchars($_SESSION['author']); ?></span>
                <?php else: ?>
                    <span class="logged-in-text">Not logged in</span>
                <?php endif; ?>
            </div>
        </section>
    </nav>
</header>