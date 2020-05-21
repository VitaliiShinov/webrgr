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
      $num = 1;

      // output data of each row
      echo "<tr>
            <th> Номер </th>
            <th> Название </th>
            <th> Жанр </th>
            <th> Режиссер </th>
            <th> Цена за билет </th>
            <th> Продано </th>
            <th> Остаток </th>
            <th> Дата </th>
            <th> Выручка </th>
            <th  colspan=\"2\"> Изменить данные </th>

             </tr>";

      while($row = mysqli_fetch_assoc($result)) {
        echo  "<tr>";
        echo  "<td>"  . $num++ . "</td>";
        echo  "<td>"  . $row['name'] . "</td>";
        echo  "<td>"  . $row['genre'] . "</td>";

        $query = "SELECT * FROM `directors` WHERE id = {$row['director']}";
        $dir = $conn->query($query);
        $dir = $dir->fetch_assoc();

        echo  "<td>"  . $dir['name'] . "</td>";
        echo  "<td>"  . $row['price'] . "</td>";
        echo  "<td>"  . $row['selled'] . "</td>";
        echo  "<td>"  . $row['leftTickets'] . "</td>";
        echo  "<td>"  . $row['date'] . "</td>";
        echo  "<td>"  . $row['gain'] . "</td>";
        echo  "<td>"  . ' <form action="editPlay.php" method="GET"> <input type="submit" name="' .$row['id'] . '" value="Изменить ' . '"/>' . " </form> </td>" ;
        echo  "<td>"  . ' <form action="index.php" method="GET"> <input type="submit" name="delBtn"'  . '" value="Удалить' .$row['id']  . '"/>' . " </form> </td>" ;

      }

    echo "</table>";
    }

  }

  if (isset($_GET['delBtn']))
  {
    $query = "SELECT * FROM `plays` ";
    $result = mysqli_query($conn, $query);

    $id = "Not a number";
    {

        while($row = mysqli_fetch_assoc($result))
        {
          $id = substr($_GET['delBtn'], 14, 100);
        }
    $sql = "DELETE FROM plays WHERE id=". $id;
    mysqli_query($conn, $sql);

    }
  }
  $conn->close();



?>

</body>
</html>
