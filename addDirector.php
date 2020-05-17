<!DOCTYPE html>
<head>
  <title>Режиссер </title>
  <meta charset="UTF-8">
</head>

<body>
  <form method="post">
    <input type="submit" name="addMocks"
                class="button" value="Тестовые Данные" />
    <br/>
    Добавить режесcера
    <br/>
    <input type="text" name="name" value="Введите имя" />
    <input type="submit" name="addDirector"
                class="button" value="Добавить" />
  </form>
</body>

<?php
  function updateTable($result)
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
        echo  "<td>"  . ' <form action="addDirector.php" method="GET"> <input type="submit" name="button" value="Delete '  . $row['id'] . '"/>' . " </form> </td>" ;
        echo  "</tr>";

      }

    echo "</table>";
    }

  }

  function addMocks($conn)
  {
    header("Refresh:0");
    $success = "Данные Добавлены";
    $sql = "INSERT INTO directors (ID, name) VALUES
                                            ('null','Steven Spielberg'),
                                            ('null','Martin Scorsese'),
                                            ('null','Alfred Hitchcock'),
                                            ('null','Stanley Kubrick')"
                                            ;
    if ($conn->query($sql) === TRUE)
      echo "<script type='text/javascript'>alert('$success');</script>";
    else
    {
      $failed = "Ошибка" .$sql . '/n' . $conn->error;
      echo "<script type='text/javascript'>alert('$failed');</script>";
    }
  }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "theater";
  // Create connection
  $conn = new mysqli($servername, $username, $password,$databaseName);
  // Check connection
  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

  else
  {
    $query = "SELECT * FROM `directors` ";
    $result = mysqli_query($conn, $query);

    updateTable($result);
    echo "</table>";
  }

  if(array_key_exists('addMocks', $_POST)) {
    addMocks($conn);
    $result = mysqli_query($conn, $query);
    updateTable($result);
  }

  if(array_key_exists('addDirector', $_POST)) {
    header("Refresh:0");
    $success = "Данные Добавлены";
    $sql = "INSERT INTO directors (id, name) VALUES ('null', '" . $_POST['name'] . "')";
    if ($conn->query($sql) === TRUE)
      echo "<script type='text/javascript'>alert('$success');</script>";
    else
    {
      $failed = "Ошибка" .$sql . '/n' . $conn->error;
      echo "<script type='text/javascript'>alert('$failed');</script>";
    }
    $result = mysqli_query($conn, $query);
    updateTable($result);
  }
  $conn->close();
?>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "theater";
  // Create connection
  $conn = new mysqli($servername, $username, $password,$databaseName);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  else
  {
    $query = "SELECT * FROM `directors` ";
    $result = mysqli_query($conn, $query);

    $id = "Not a number";
    if($_SERVER['REQUEST_METHOD'] == "GET" and (isset($_GET['button'])) )
    {

        while($row = mysqli_fetch_assoc($result))
        {
          if(isset($_GET['button']))
            $id = substr($_GET['button'], 7, 100);
        }
    $sql = "DELETE FROM directors WHERE id=". $id;

    if ($conn->query($sql) === TRUE)
    {
      $query = "SELECT * FROM `directors` ";
      $result = mysqli_query($conn, $query);


    }

  }
}
?>
