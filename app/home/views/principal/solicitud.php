<div class="container">
	<div class="col s12 m3">
		<div class="card-panel darken-2 z-depth-2">
			<h5 class="red-text"><i class="fa fa-file-text-o"></i> Registro de Entes</h5>
			<br>
			<form action="<?php echo baseUrl ?>home/principal/solicitud" method="POST" class="col s12">
				<?php echo Token::field() ?>
				<select name="tipo_solicitud_id" id="municipioSelect" onchange="this.form.submit()">
					<?php
					$tipos = App\Tipo::all();
					?>
					<option value="">Tipo de Ente</option>
					<?php foreach ($tipos as $key => $t): ?>
					<option value="<?php echo $t->id ?>"><?php echo $t->nombre ?></option>
					<?php endforeach ?>
				</select>
			</form>
		</div>
	</div>
	<?php if (isset($requerimientos) and $requerimientos): ?>
	<div class="col s12 m3">
		<div class="card-panel darken-2 z-depth-2">
			<h5 class="red-text"><i class="fa fa-clipboard"></i> Documentos a Consignar</h5>
			<br>
        <ol class="ul">
          <?php foreach ($requerimientos as $key => $r): ?>
          <?php if ($r->prioridad == true): ?>
          <?php $required = "required" ?>
          <?php $requerido ="*" ?>
          <?php else: ?>
          <?php $required = "" ?>
          <?php $requerido ="" ?>
          <?php endif ?>
          <li><?php echo $r->nombre ?>
            <label class="red-text"> <?php echo $requerido?></label>
          </li>
          <?php endforeach ?>
        </ul>
		</div>
	</div>
	<?php else: ?>
	
	<?php endif ?>
</div>