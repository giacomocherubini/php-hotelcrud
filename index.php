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

<?php

  include 'layout/_head.php';
  include 'layout/_header.php';

 ?>

    <div class="container">
      <h1>ROOMS & SUITES</h1>

      <table class="table">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Room Number</th>
            <th class="text-center">Floor</th>
            <th class="text-center">Beds</th>
            <th class="text-right">Created At</th>
            <th class="text-right">Updated At</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // se $result è definito e il numero delle righe di $result è maggiore di zero
        if($result && $result->num_rows > 0) {
          // prendi questi risultati, recupera la riga dei risultati successiva , inseriscila dentro row, finche row é definito
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
            <td class="text-center"><?php echo $row['id'] ?></td>
            <td class="text-center"><?php echo $row['room_number'] ?></td>
            <td class="text-center"><?php echo $row['floor'] ?></td>
            <td class="text-center"><?php echo $row['beds'] ?></td>
            <td class="text-right"><?php echo $row['created_at'] ?></td>
            <td class="text-right"><?php echo $row['updated_at'] ?></td>
            <td class="text-center"><a href='show.php?id=<?php echo $row['id'] ?>' class="btn btn-info">Visualizza</a></td>
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
    <?php include 'layout/_footer.php'; ?>
