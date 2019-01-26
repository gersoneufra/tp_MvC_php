<section>
  Lista de Rutas
</section>
<table class="table is-striped">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Ruta</th>
      <th>Imagen</th>
      <th>ver</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($this->vars['routes']) {
      foreach ($this->vars['routes'] as $route){?>
        <tr>
          <td><?= $route['RUTCOD'] ?></td>
          <td><?= $route['RUTNOM'] ?></td>
          <td>
            <figure class="image is-24x24">
              <?php img_tag($route['RUTNOM']) ?>
            </figure>
          </td>
          <td>
            <a href="/tp_MvC_php/tours/show/<?= $route['RUTCOD']?>">
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