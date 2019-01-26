<h1> Ruta <?= $this->vars['route']['RUTNOM']?></h1>
<figure class="image is-3by1">
  <?php img_tag($this->vars['route']['RUTNOM']) ?>
</figure>
<table class="table is-striped">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Costo</th>
      <th>Pasajeros</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($this->vars['tours']) {
      foreach ($this->vars['tours'] as $row){ ?>
        <tr>
          <td><?= $row['VIANRO'] ?></td>
          <td><?= $row['VIAFCH'] ?></td>
          <td><?= $row['VIAHRS'] ?></td>
          <td><?= $row['COSVIA'] ?></td>
          <td>
            <a href="/tp_MvC_php/passingers/by_tour/<?= $row['VIANRO']?>">
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