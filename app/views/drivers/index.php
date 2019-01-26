<section>
  Lista de Choferes
</section>
<table class="table is-striped">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Fecha de Ingreso</th>
      <th>Categoria</th>
      <th>Foto</th>
      <th>Ver</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($this->vars['drivers']) {
      foreach ($this->vars['drivers'] as $row){?>
        <tr>
          <td><?= $row['IDCOD'] ?></td>
          <td><?= $row['CHONOM'] ?></td>
          <td><?= $row['CHOFIN'] ?></td>
          <td><?= $row['CHOCAT'] ?></td>
          <td>
            <figure class="image is-24x24">
              <?php img_tag($row['IDCOD']) ?>
            </figure>
          </td>
          <td>
            <a href="/tp_MvC_php/drivers/show/<?= $row['IDCOD']?>">
              <span class="icon has-text-info">
                <i class="fas fa-eye"></i>
              </span>
            </a>
          </td>
        </tr>
      <?php }?>
    <?php } else { ?>
      <tr>
        <td colspan="5">sin datos</td>
      </tr>
  <?php }?>
  </tbody>
</table>