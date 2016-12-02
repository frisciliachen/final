<?php
require_once "conn.php";

function konek_db() {
    global $DB;

    $conn = mysqli_connect($DB['host'], $DB['user'], $DB['password']);
    if (! $conn)
        die("<p>Koneksi database gagal.</p>");

    $db = mysqli_select_db($conn, $DB['db']);
    if (! $db)
        die("<p>Tidak dapat membuka database.</p>");

    return $conn;
}
?>
