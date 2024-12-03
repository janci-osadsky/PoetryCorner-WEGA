<?php
date_default_timezone_set('Europe/Bratislava');

// Display Random Poems
function displayRandom($limit, $title) {
    $conn = new mysqli('localhost', 'root', '', 'poems');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM poems ORDER BY RAND() LIMIT ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h2 class='text-center mb-4'>{$title}</h2>";
        echo "<div class='row justify-content-center'>";
        while ($poem = $result->fetch_assoc()) {
            $firstFourVerses = nl2br(htmlspecialchars(implode("\n", array_slice(explode("\n", $poem['text']), 0, 4))));
            echo <<<HTML
            <div class='col-md-4'>
                <div class='card poetry-card h-100'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$poem['name']}</h5>
                        <p class='card-text'>{$firstFourVerses}</p>
                        <div class='text-muted'>
                            <a href='fullpoem.php?id={$poem["ID"]}' class='btn btn-outline-primary'>Read More</a><br>
                            <small>{$poem['author']}</small>
                        </div>
                    </div>
                </div>
            </div>
            HTML;
        }
        echo "</div></div>";
    }

    $stmt->close();
    $conn->close();
}

// Display Full Poem
function displayFull($poemID) {
    $conn = new mysqli('localhost', 'root', '', 'poems');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM poems WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $poemID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $poem = $result->fetch_assoc();
        $poemtext = nl2br(htmlspecialchars($poem['text']));
        echo <<<HTML
        <div class='container mb-4'>
            <h2 class='text-center mb-4'>{$poem['name']}</h2>
            <div class='card poetry-card h-100'>
                <p class='card-text'>{$poemtext}</p>
            </div>
            <p class='text-muted'>Author: {$poem['author']}</p>
            <p class='text-muted'>Language: {$poem['lang']}</p>
        </div>
        HTML;
    } else {
        echo "<div class='container'><p>No poem found with the given ID.</p></div>";
    }

    $stmt->close();
    $conn->close();
}

// Display Partial Poem
function displayPart($poemID) {
    $conn = new mysqli('localhost', 'root', '', 'poems');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM poems WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $poemID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $poem = $result->fetch_assoc();
        $firstFourVerses = nl2br(htmlspecialchars(implode("\n", array_slice(explode("\n", $poem['text']), 0, 4))));
        echo <<<HTML
        <div class='container'>
            <div class='row justify-content-center'>
                <div class='col-md-4'>
                    <div class='card poetry-card h-100'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$poem['name']}</h5>
                            <p class='card-text'>{$firstFourVerses}</p>
                            <div class='text-muted'>
                                <a href='fullpoem.php?id={$poem["ID"]}' class='btn btn-outline-primary'>Read More</a><br>
                                <small>{$poem['author']}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        HTML;
    } else {
        echo "<div class='container'><p>No poem found with the given ID.</p></div>";
    }

    $stmt->close();
    $conn->close();
}
?>
