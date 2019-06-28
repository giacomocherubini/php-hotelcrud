<?php
  include 'db_config.php';

  // Creo una connessione
  $conn = new mysqli($servername, $username, $password, $dbname);

  // vedo se la connessione con il database è stata effettuata
  if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}
  // query di select
  $sql = "SELECT * FROM stanze";
  // esegui questo sql 'esegui questa istruzione'
  $result = $conn->query($sql);

  $conn->close();
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="public/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-dark bg-dark">
        <a href="#"><i class="fa fa-twitter white"></i></a>
        <a href="#"><i class="fa fa-facebook-f white"></i></a>
        <a href="#"><i class="fa fa-twitter white"></i></a>
      </nav>
      <img class="rounded mx-auto d-block"  src="http://www.theplazany.com/wp-content/uploads/2016/02/PlazaLogo_Primary_RGB_WheatandWarmGray_2X.png" alt="">
      <nav class="nav_under_logo">
        <a href="#">History</a>
        <a href="#">Gallery</a>
        <a href="#">Reservations</a>
        <a href="#">Offers</a>
        <a href="#">Contact</a>

      </nav>
    </header>

    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Room Number</th>
            <th scope="col">Floor</th>
            <th scope="col">Beds</th>
            <th scope="col">Created At</th>
            <th scope="col">Update At</th>
          </tr>
        </thead>
        <tbody>




        <?php
        // se $result è definito e il numero delle righe di $result è maggiore di zero
        if($result && $result->num_rows > 0) {
          // prendi questi risultati, recupera la riga dei risultati successiva , inseriscila dentro row, finche row é definito
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['room_number'] ?></td>
            <td><?php echo $row['floor'] ?></td>
            <td><?php echo $row['beds'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
            <td><?php echo $row['updated_at'] ?></td>
            </tr>
            <?php
          }
          // è fallito perchè $result è definito ma non ci sono righe
        } elseif($result) {
          echo "Non ci sono risultati";
          // è fallito perchè entrabe le condizioni dell if erano false
        } else {
          echo "Si è verificato un errore";
        }
        ?>
        </tbody>
      </table>
    </div>
    <script src='public/js/app.js'></script>
  </body>
</html>
