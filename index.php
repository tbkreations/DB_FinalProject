<?php
    session_start();

    $include("connection.php");
    $include("functions.php");

    $user_data = check_login($dbCon)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Scholarship Database Program</title>
</head>
<body>
    <h1>My Scholarship List - Home Page</h1>
    <a href="logout.php">Logout</a>
    <h2>Hello, <?php echo $_SESSION['name']; ?> </h2>
</body>
</html> 