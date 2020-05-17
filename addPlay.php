<html>
  <head>
    <meta charset="UTF-8" />
  </head>
  <body>
    <form method="POST" action="addPlay.php">
      название: <input type="text" name="name" /><br />
      жанр: <input type="text" name="genre" /><br />

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

        else{
          $query = "SELECT * FROM `directors` ";
          $result = mysqli_query($conn, $query);
          if(!$result) echo mysqli_error($conn);
          $options = "";
          while($row = mysqli_fetch_array($result)){
            $options = $options."<option>$row[1]</option>";
          }
        }

        $conn->close();
?>

      режесcер:
      <select name="director">
    <?php echo $options;?>
  </select>
      <br/>


      стоимость билета: <input type="text" name="price" /><br />
      продано билетов:  <input type="text" name="selled" /><br />
      дата:  <input type="date" name="date" /><br />
      <input type="submit" name="addPlay"
                  class="button" value="Добавить" />
    </form>
  </body>
</html>

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

    if(array_key_exists('addPlay', $_POST)) {

      $success = "Данные Добавлены";
      $sql = "INSERT INTO plays (id, name, genre, director, price, selled, date) VALUES ('null','".$_POST["name"]."','".$_POST["genre"]."','".$_POST["director"]."','".$_POST["price"]."','".$_POST["selled"]."','".$_POST["date"]."')";

      if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    $conn->close();
  }
?>
