<?php
define("AUTOR", "Jan Osadsky");
define("WEB", "osadsky2@uniba.sk");
define("FARBA", "rgba(153, 0, 0, 0.7)");
$current_language = isset($_GET['lang']) ? $_GET['lang'] : 'en'; // Default to English

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>