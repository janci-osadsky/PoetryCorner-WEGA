<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <h1><?php echo $title; ?></h1>
    <img src="obrazky/poetry.png" alt="Poetry Image" class="img-fluid" style="position: fixed; top: 30px; right: 10px; max-width: 100px; display: block;" id="poetry-image">
    <script>
        function checkImageVisibility() {
            const poetryImage = document.getElementById('poetry-image');
            if (window.innerWidth < 768) { // Adjust the width as needed
                poetryImage.style.display = 'none';
            } else {
                poetryImage.style.display = 'block';
            }
        }
        window.onload = checkImageVisibility;
        window.onresize = checkImageVisibility;
    </script>

    <?php include("navigacia.php"); ?>
