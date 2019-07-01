<?php
  include 'db_config.php';

  // Creo una connessione
  $conn = new mysqli($servername, $username, $password, $dbname);

  // vedo se la connessione con il database è stata effettuata
  if ($conn && $conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
    exit();
}

  // vado a leggermi il parametro GET che si chiama id
  $id_stanza = $_GET['id'];

  // query di select
  $sql = "SELECT * FROM stanze WHERE id = $id_stanza" ;
  // esegui questo sql 'esegui questa istruzione'
  $result = $conn->query($sql);

  $conn->close();
 ?>

<?php

  include 'layout/_head.php';
  include 'layout/_header.php';

 ?>

<div class="container">
  <h1>Stanza id: <?php echo $id_stanza ?></h1>
  <?php
  // se $result è definito e il numero delle righe di $result è maggiore di zero
  if($result && $result->num_rows > 0) {
    // prendi questi risultati, recupera la riga dei risultati successiva , inseriscila dentro row, finche row é definito
    $row = $result->fetch_assoc(); ?>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Stanza numero <?php echo $row['room_number'] ?></h5>
        <p class="card-text">
          <ul>
            <li><strong>Piano: </strong><?php echo $row['floor'] ?> </li>
            <li><strong>Numero letti: </strong><?php echo $row['beds'] ?> </li>
            <li><strong>Inserita il: </strong><?php echo $row['created_at'] ?> </li>
            <li><strong>aggiornata il: </strong><?php echo $row['updated_at'] ?> </li>
          </ul>
        </p>
        <a href="index.php" class="btn btn-primary">Vedi tutte le stanze</a>
      </div>
    </div>

      <?php
    // è fallito perchè $result è definito ma non ci sono righe
  } elseif($result) {
    echo "Non ci sono risultati";
    // è fallito perchè entrabe le condizioni dell if erano false
  } else {
    echo "Si è verificato un errore";
  }
  ?>
</div>

<?php include 'layout/_footer.php'; ?>
