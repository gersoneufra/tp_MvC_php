<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de rutas</title>
    <link rel="stylesheet" href="./../../css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
    <?php
      print_r($_GET['code']);
      require_once './../../models/pasajero.php';
      
      $pasajero = new Pasajero();
      $pasajeros = $pasajero->find_by_viaje($_GET['code']);
    ?>
    <div class="container">
      <table class="table is-striped">
        <thead>
          <tr>
            <th>Boleto</th>
            <th>Nombre</th>
            <th>Asiento</th>
            <th>Pago</th>
            <th>Accciones</th>
          </tr>
        </thead>
        <tbody>
          <?php if (mysqli_num_rows($pasajeros) > 0) {
            while($row = mysqli_fetch_assoc($pasajeros)) {?>
              <tr>
                <td><?= $row['BOLNRO'] ?></td>
                <td><?= $row['Nom_pas'] ?></td>
                <td><?= $row['Nro_asi'] ?></td>
                <td><?= $row['pago'] ?></td>
                <td>
                  <a href="/pr5/views/pasajeros/show.php?code=<?= $row['BOLNRO']?>">
                    <span class="icon has-text-info">
                      <i class="fas fa-eye"></i>
                    </span>
                  </a>
                </td>
              </tr>
            <?php }?>
          <?php }else{ ?>
            <tr>
              <td colspan="5">sin datos</td>
            </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </body>
</html>