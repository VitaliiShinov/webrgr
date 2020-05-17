<!DOCTYPE HTML>

<html>
<head>
<title>Театр </title>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
  <h1>Спектакли</h1>
<a href="./addPlay.php">Добавить спектакль</a> <a href="addDirector.php">Добавить Режиссера</a>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  // Create connection
  $conn = new mysqli($servername, $username, $password, "theater");
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  else
  {
    $sql = "SELECT * FROM `plays` ";
    $result = $conn->query($sql);

    echo '<table border="2">';
    if (mysqli_num_rows($result) > 0)
    {
      // output data of each row
      echo "<tr>
            <th> ID </th>
            <th> Название </th>
            <th> Жанр </th>
            <th> Режиссер </th>
            <th> Цена за билет </th>
            <th> Продано </th>
            <th> Остаток </th>
            <th> Дата </th>
            <th> Выручка </th>
            <th> Изменить данные </th>

             </tr>";

      while($row = mysqli_fetch_assoc($result)) {
        echo  "<tr>";
        echo  "<td>"  . $row['id'] . "</td>";
        echo  "<td>"  . $row['name'] . "</td>";
        echo  "<td>"  . $row['genre'] . "</td>";
        echo  "<td>"  . $row['director'] . "</td>";
        echo  "<td>"  . $row['price'] . "</td>";
        echo  "<td>"  . $row['selled'] . "</td>";
        echo  "<td>"  . $row['leftTickets'] . "</td>";
        echo  "<td>"  . $row['date'] . "</td>";
        echo  "<td>"  . $row['gain'] . "</td>";
        echo  "<td>"  . ' <form action="editPlay.php" method="GET"> <input type="submit" name="button" value="Изменить '  . $row['id'] . '"/>' . " </form> </td>" ;
      }

    echo "</table>";
    }

  }






  $conn->close();





?>


</body>
</html>
