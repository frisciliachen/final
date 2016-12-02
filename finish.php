<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once "db.php";
session_start();
if (isset($_POST["Submit"])) {
    $_SESSION["username"] = $username;
    $_SESSION["date"] = $date;
    $_SESSION["time"] = $time;
    $_SESSION["people"] = $people;

    $conn = konek_db();

    $query = $conn->prepare("insert into pesanan(username, date, time, people) values(?, ?, ?, ?)");
  
    $query->bind_param("siii", $username, $date, $time, $people);

    $result = $query->execute();

    
    if (! $result)
        die("<p>Proses query gagal.</p>");

    echo "<p>Data menu berhasil ditambahkan.</p>";
} 
?>

<h1 align="center">Thankyou for ordering.</h1>
<h2 align="center">Please complete payment and we will contact you soon.</h2>
<h4 align="center">Regards, NoQueue Restaurant</h4>
<a href="logout.php"><input type="submit" value="Logout" style="margin: 50px;  padding: 20px; margin-left: 620px;"></a>
</body>
</html>