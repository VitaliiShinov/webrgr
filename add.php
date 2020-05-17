<html>
  <head>
    <meta charset="UTF-8" />
  </head>
  <body>
    <form align="center">
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
          mysql_query("SET NAMES 'UTF8  '");
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
      <select>
    <?php echo $options;?>
  </select>
       <?php
?>
      название: <input type="text" name="name" /><br />
      стоимость билета: <input type="text" name="name" /><br />
      продано билетов:  <input type="text" name="name" /><br />
      дата:  <input type="date" name="name" /><br />
    </form>
  </body>
</html>
