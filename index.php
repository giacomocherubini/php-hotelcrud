<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="public/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>

    <?php
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "db_hotel";

      // Connect
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn && $conn->connect_error) {
      echo ("Connection failed: " . $conn->connect_error);
      } else {
        echo "Connection established";
      }

      $sql = "SELECT room_number, floor FROM stanze";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor'];
          echo '<br>';
        }
      } elseif ($result) {
      echo "0 results";
      } else {
      echo "query error";
      }
      $conn->close();

    ?>

    <script src='public/js/app.js'></script>
  </body>
</html>
