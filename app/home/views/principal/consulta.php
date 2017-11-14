<div class="container">
	<div class="card-panel darken-2 z-depth-2">
		<h5 class="red-text"><i class="fa fa-search-plus"></i> CONSULTA DE SOLICITUD</h5>
		<br>
		<form action="<?php echo baseUrl ?>home/principal/consulta" method="POST" class="col s12">
			<?php echo Token::field() ?>
			<div class="row">
				<div class="input-field col s6 m3">
					<i class="fa fa-barcode red-text prefix"></i>
					<input name="cod" id="icon_prefix" type="text" class="validate">
					<label for="icon_prefix">NÚMERO SOLICITUD</label>
				</div>
				<div class="input-field col s6 m3">
					<i class="fa fa-user red-text prefix"></i>
					<input name="cedula" id="icon_telephone" type="tel" class="validate">
					<label for="icon_telephone">CEDULA SOLICITANTE</label>
				</div>
				<div class="input-field col s6 m3">
					<button class="btn waves-effect waves-light red" type="submit"><i class="fa fa-search"></i></button>
				</div>
			</div>
		</form>
	</div>
	<?php if (isset($solicitud) and $solicitud): ?>
	<?php
	list($fecha,$hora) = explode(' ', $solicitud->fecha_hora_registrado);
	list($ano,$mes,$dia) = explode('-', $fecha);
	$fecha = $dia.'/'.$mes.'/'.$ano;
	?>
	<div class="col s12 m12 darken-2 z-depth-2">
		<div class="card horizontal">
			<div class="card-stacked">
				<div class="card-content">
					<div class="col-lg-6 animated fadeIn">
						<table class="">
							<tbody>
								<tr class="grey-text text-darken-2">
									<td width="40%" ><b><i class="fa fa-folder"></i>Tipo Solicitud:</b></td>
									<td><?php echo strtoupper($solicitud->tipo_solicitud->nombre) ?></td>
								</tr>
								<tr class="grey-text text-darken-2">
									<td width="40%" ><b><i class="fa fa-barcode"></i> Solicitud N°:</b></td>
									<td><?php echo ucwords($solicitud->cod) ?></td>
								</tr>	
								<?php if ($solicitud->requerimiento_categoria_id): ?>
								<tr class="grey-text text-darken-2">
									<td ><b><i class="fa fa-file"></i> Requerimiento:</b></td>
									<td><?php echo ucwords($solicitud->requerimiento_categoria->nombre) ?></td>
								</tr>
								<?php endif ?>
								<tr class="grey-text text-darken-2">
									<td ><b><i class="fa fa-building-o"></i> Organismo Asignado:</b></td>
									<td><?php echo ucwords($solicitud->organismo->nombre) ?></td>
								</tr>
								<tr class="grey-text text-darken-2">
									<td ><b><i class="fa fa-calendar"></i> Fecha Registro:</b></td>
									<td><?php echo $fecha ?></td>
								</tr>
								<?php if ($solicitud->observacion): ?>
								<tr class="grey-text text-darken-2">
									<td ><b><i class="fa fa-align-justify"></i> Obervación:</b></td>
									<td><?php echo $solicitud->observacion ?></td>
								</tr>
								<?php endif ?>
								<?php if ($solicitud->monto_solicitado): ?>
								<tr class="grey-text text-darken-2">
									<td ><b><i class="fa fa-get-pocket text-warning"></i> <i class="fa fa-money"></i> Monto solicitado:</b></td>
									<td><?php echo $solicitud->monto_solicitado ?></td>
								</tr>
								<?php endif ?>
								<?php if ($solicitud->monto_aprobado): ?>
								<tr class="grey-text text-darken-2">
									<td ><b><i class="fa fa-check-square text-success"></i> <i class="fa fa-money"></i> Monto Aprobado:</b></td>
									<td><?php echo $solicitud->monto_aprobado ?></td>
								</tr>
								<?php endif ?>
								<tr class="grey-text text-darken-2">
									<td ><b><i class="fa fa-hand-paper-o"></i> Estatus:</b></td>
									<td>
										<?php if ($solicitud->estatus == 1): ?>
										<button onclick="cerrar()" type="submit" class="btn btn-primary">
										<i class="fa fa-search"></i> En estudio
										</button>
										<?php endif ?>
										<?php if ($solicitud->estatus == 2): ?>
										<a class="btn btn-success" href="#"><i class="fa fa-check-square"></i> APROBADO</a>
										<?php endif ?>
										<?php if ($solicitud->estatus == 3): ?>
										<a class="btn btn-danger" href="#"><i class="fa fa-window-close"></i> RECHAZADO</a>
										<?php endif ?>
										<?php if ($solicitud->estatus == 4): ?>
										<a class="btn btn-success" href="#"><i class="fa fa-share-square"></i> ENTREGADO</a>
										<?php endif ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<?php endif ?>
</div>