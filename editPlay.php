<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>
  <body>


<?php

  function getDirectorOptions()
  {

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

    else{
      $sql = "SELECT * FROM `directors`  ";
      $result = mysqli_query($conn, $sql);
      if(!$result) echo mysqli_error($conn);
      $options = "";
      while($row = mysqli_fetch_array($result)){
        $options = $options."<option>$row[1]</option>";
      }
    }

    $conn->close();
    return $options;
  }

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

  else{
    $id = "Not a number";
    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
      $id = array_keys($_GET)[0];

    $query = "SELECT * FROM `plays` WHERE id =".$id;
    $result = mysqli_query($conn, $query);

    if(!$result) echo mysqli_error($conn);
    $raw = $result->fetch_assoc();

    echo '<form method="POST" action="editPlay.php">';

    echo 'ID: <input type="text" name="id" value="'.$raw["id"].'" /><br />';
    echo 'название: <input type="text" name="name" value="'.$raw["name"].'" /><br />';
    echo 'жанр: <input type="text" name="genre" value="'.$raw["genre"].'" /><br />';

    $options =getDirectorOptions();

    while($row = mysqli_fetch_array($result)){
      $options = $options."<option>$row[1]</option>";
      }

    echo 'режесcер: <select name="director">';
    echo $options;
    echo '</select>
          <br/>';


    echo 'стоимость билета: <input type="text" name="price" value="'.$raw["price"].'" /><br />';
    echo 'продано билетов:  <input type="text" name="selled"  value="'.$raw["selled"].'"/><br />';
    echo 'остаток билетов:  <input type="text" name="left"  value="'.$raw["leftTickets"].'"/><br />';
    echo 'дата:  <input type="date" name="date" value="'.$raw["date"].'"/><br />';
    echo 'выручка: <input type="text" name="gain" value="'.$raw["price"] * $raw["selled"].'" /><br />';


    echo '<input type="submit" name="editPlay"
                class="button" value="Сохранить" />
     </form>
      <a href="./index.php">Назад</a>;
     </html>';
     $conn->close();

}
}


?>


<?php
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

  if(array_key_exists('editPlay', $_POST)) {

    $sql = "UPDATE plays SET name ='".$_POST['name']."', genre ='" . $_POST['genre'] ."', director ='" . $_POST['director']. "', price ='" .  $_POST['price']. "', selled ='" . $_POST['selled'] . "', leftTickets ='" . $_POST['left'] . "', date ='" .$_POST['date'] . "', gain ='" . $_POST['gain']. "'WHERE id=" .$_POST['id'];


   if (mysqli_query($conn, $sql)) {

     echo "Record was edit successfully <br />";
     echo '<a href="./index.php">Назад</a>';
   } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
  }
}


 ?>
