<a href="/tp_MvC_php/passingers/new/<?= $this->vars['code_tour']?>" class="button is-primary is-rounded">Nuevo Pasajero</a>
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
    <?php if ($this->vars['passingers']) {
      foreach($this->vars['passingers'] as $row) {?>
        <tr>
          <td><?= $row['BOLNRO'] ?></td>
          <td><?= $row['Nom_pas'] ?></td>
          <td><?= $row['Nro_asi'] ?></td>
          <td><?= $row['pago'] ?></td>
          <td>
            <a href="/tp_MvC_php/passingers/delete/<?= $row['BOLNRO']?>">
              <span class="icon has-text-info">
                <i class="far fa-trash-alt"></i>
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