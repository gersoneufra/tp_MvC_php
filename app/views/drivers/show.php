<section>
  Viajes realizados por: <?= $this->vars['driver']['CHONOM']?>
</section>
<table class="table is-striped">
  <thead>
    <tr>
      <th>Viaje</th>
      <th>Ruta</th>
      <th>Fecha de Viaje</th>
      <th>Costo</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($this->vars['tours']) {
      foreach ($this->vars['tours'] as $row){?>
        <tr>
          <td><?= $row['VIANRO'] ?></td>
          <td><?= $row['CHONOM'] ?></td>
          <td><?= $row['VIAFCH'] ?></td>
          <td><?= $row['COSVIA'] ?></td>
        </tr>
      <?php }?>
    <?php } else { ?>
      <tr>
        <td colspan="5">sin datos</td>
      </tr>
  <?php }?>
  </tbody>
</table>