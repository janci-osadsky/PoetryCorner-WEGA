<?php
include('includes/udaje.php');
include('includes/functions/funkcie.php');

// Set the page title based on the current language
$title = isset($current_language) && $current_language === 'sk' ? 
    "Jančiho básnický kút" : "Johnny's Poetry Corner";

include('includes/hlavicka.php');

// Establish a database connection
$conn = new mysqli('localhost', 'root', '', 'poems');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get selected category (if any)
$selected_category = isset($_GET['category']) ? $_GET['category'] : 'all';

// SQL query to fetch poems
if ($selected_category === 'all') {
    $sql = "SELECT * FROM poems";
} else {
    $sql = "SELECT p.* FROM poems p 
            JOIN {$selected_category} c ON p.ID = c.poemID";
}
$result = $conn->query($sql);

// Fetch categories for dropdown
$categories_result = $conn->query("SELECT name FROM category");
?>

<div class="container">
    <h1 class="text-center">
        <?php echo $current_language === 'sk' ? 
            "Preskúmajte našu zbierku poézie" : "Explore Our Poetry Collection"; ?>
    </h1>
    <p class="text-center">
        <?php echo $current_language === 'sk' ? 
            "Prejdite si naše rôzne kategórie básní" : "Browse through our diverse categories of poems"; ?>
    </p>

    <!-- Dropdown Filter -->
    <form method="get" action="categories.php" class="text-center mb-4">
        <label for="category">
            <?php echo $current_language === 'sk' ? "Vyberte kategóriu:" : "Select a category:"; ?>
        </label>
        <select name="category" id="category" class="form-select d-inline-block w-auto">
            <option value="all" <?php echo $selected_category === 'all' ? 'selected' : ''; ?>>
                <?php echo $current_language === 'sk' ? "Všetky kategórie" : "All Categories"; ?>
            </option>
            <?php while ($row = $categories_result->fetch_assoc()): ?>
                <option value="<?php echo htmlspecialchars($row['name']); ?>" 
                    <?php echo $selected_category === $row['name'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars(ucfirst(str_replace("_", " ", $row['name']))); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <button type="submit" class="btn btn-primary">
            <?php echo $current_language === 'sk' ? "Filtrovať" : "Filter"; ?>
        </button>
    </form>

    <!-- Poems Display -->
    <section class="poems-section py-4">
        <div class="container">
            <div class="row">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($poem = $result->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card poetry-card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($poem['name']); ?></h5>
                                    <p class="card-text">
                                        <?php echo nl2br(htmlspecialchars(implode("\n", array_slice(explode("\n", $poem['text']), 0, 4)))); ?>
                                    </p>
                                    <a href="fullpoem.php?id=<?php echo $poem['ID']; ?>" class="btn btn-outline-primary">
                                        <?php echo $current_language === 'sk' ? "Čítať viac" : "Read More"; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-center">
                        <?php echo $current_language === 'sk' ? "Žiadne básne neboli nájdené." : "No poems found."; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php
$conn->close();
include("includes/pata.php");
?>
