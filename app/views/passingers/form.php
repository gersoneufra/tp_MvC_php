<form method="post" action="/tp_MvC_php/passingers/create">
	<input type="hidden" value="<?= $this->vars['tour']['VIANRO']?>" name="passinger[VIANRO]">
	<div class="field">
  	<label class="label">Nombre</label>
	  <div class="control has-icons-left has-icons-right">
	    <input class="input" type="text" placeholder="ingrese nombre" value="" name="passinger[Nom_pas]">
	    <span class="icon is-small is-left">
	      <i class="fas fa-user"></i>
	    </span>
	    <span class="icon is-small is-right">
	      <i class="fas fa-check"></i>
	    </span>
	  </div>
	</div>
	<div class="field">
		<label class="label">Asiento</label>
		<div class="select">
		  <select name="passinger[Nro_asi]">
		    <option>Seleccione Asiento</option>
		    <?php foreach ($this->vars['seating'] as $option) {
		    	echo "<option value='$option'>$option</option>";
		    } ?>
		  </select>
		</div>
	</div>
	<div class="field">
		<label class="label">Tipo de pasajero</label>
		<div class="control">
		  <label class="radio">
		    <input type="radio" name="passinger[tipo]" value="N">
		    Niño
		  </label>
		  <label class="radio">
		    <input type="radio" name="passinger[tipo]" value="E">
		    Estudiante
		  </label>
		  <label class="radio">
		    <input type="radio" name="passinger[tipo]" value="A">
		    Adulto
		  </label>
		</div>
	</div>

	<div class="field">
  	<label class="label">Pago del viaje</label>
	  <div class="control has-icons-left has-icons-right">
	    <input class="input" type="number" placeholder="ingrese monto" value="<?= $this->vars['tour']['COSVIA'] ?>" name='passinger[pago]'>
	    <span class="icon is-small is-left">
	      <i class="fas dollar-sign"></i>
	    </span>
	    <span class="icon is-small is-right">
	      <i class="fas fa-check"></i>
	    </span>
	  </div>
	</div>

	<input type="submit" class="button is-success" name="save">
</form>