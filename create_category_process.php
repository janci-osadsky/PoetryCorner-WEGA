<!-- create_category_process.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryName = $_POST['category_name'];

    // Validate and sanitize the category name (you may want to do more validation)
    $categoryName = trim($categoryName);
    if (empty($categoryName)) {
        echo "Category name cannot be empty.";
        exit;
    }

    // Connect to the database (replace with your database configuration)
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "poems"; // Replace with your database name

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create a new table with the entered category name
    $tableName = strtolower(str_replace(' ', '_', $categoryName) . "_poems"); // Format the table name
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        author VARCHAR(100) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Category created successfully.";
    } else {
        echo "Error creating category: " . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Redirect back to create_category.php
    header("Location: categories.php");
    exit;
}
?>
