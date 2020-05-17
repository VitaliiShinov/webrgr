<!DOCTYPE HTML>

<html>
<head>
<title>Театр </title>
<meta charset="UTF-8">
</head>
<body>
<a href="./add.php">Add</a>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  // Create connection
  $conn = new mysqli($servername, $username, $password);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $conn->close();
?>

<a href="addDirector.php">Добавить Режиссера</a>
</body>
</html>
