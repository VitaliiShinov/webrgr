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



  else
  {
    echo '<table border="2">';
    if (mysqli_num_rows($result) > 0)
    {

      // output data of each row
      echo "<tr>" . "<th>" . "ID" . "</th>" . "<th>" . "Режиссер" . "</th>" . "</tr>";
      while($row = mysqli_fetch_assoc($result)) {
        echo  "<tr>";
        echo  "<td>"  . $row['id'] . "</td>";
        echo  "<td>"  . $row['name'] . "</td>";
      }

    echo "</table>";
    }

  }






  $conn->close();





?>

<a href="addDirector.php">Добавить Режиссера</a>
</body>
</html>
