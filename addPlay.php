<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
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
          $num = 1;
          while($row = mysqli_fetch_array($result)){
            $options = $options. "<option>$num.$row[1]</option>";
            $num++;
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
  require("testInput.php");
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


    $name = $genre = $price = $selled =  "";
    $date = NULL;

  $name = test_input($_POST["name"]);
  $genre = test_input($_POST["genre"]);
  $price = test_input($_POST["price"]);
  $selled = test_input($_POST["selled"]);
  $date = test_input($_POST["date"]);
  $num ="";
  $array = str_split($_POST["director"]);
    foreach ($array as $char)
     {
       if(is_numeric($char))
        $num.=$char;
      }

      $sql = "INSERT INTO plays (id, name, genre, director, price, selled, date) VALUES ('null', $name, $genre, $num, $price, $selled, $date)";

      if (mysqli_query($conn, $sql)) {

    } else {
      echo "Ошибка ввода ";
    }
    }
    $conn->close();
  }
  echo "<a href=./index.php>Go back</a>";

?>
