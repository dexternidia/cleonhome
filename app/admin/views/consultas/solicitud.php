<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted "><i class="fa fa-file fa-2x"></i> SOLICITUD</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form id="formulario" method="GET" action="<?php echo baseUrl ?>admin/consultas/solicitud">
          <?php echo Token::field() ?>
          <div class="col-md-6">
            <div class="col-md-10">
              <input class="form-control" name="cod" type="number" min="3" step="1" id="myInput" placeholder="Codigo de solicitud...">
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <a class="btn btn-block btn-default animated" href="javascript:{}" onclick="$('#formulario').submit();"><i class="fa fa-search fa-2x text-primary"></i></a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    <h5 class="text-muted text-primary text-center">
    <i class="fa fa-folder-open"></i> SOLICITUDES
    </h5>
    <div class="row">
      <div class="col-md-12 table-responsive">
        <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th width="5%" class="text-uppercase">N° Solicitud</th>
              <th width="5%" class="text-uppercase">Fecha</th>
              <th width="10%" class="text-uppercase">Cédula</th>
              <th width="22%" class="text-uppercase">Solicitante</th>
              <th class="text-uppercase">Telefono n°1</th>
              <th class="text-uppercase">Telefono n°2</th>
              <th width="1%" class="text-uppercase">Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (Paginator($solicitudes,7) as $c): ?>
            <?php
            $fecha = $c->fecha_hora_asignado_consignado;
            list($date,$hora) = explode(' ', $fecha);
            list($ano,$mes,$dia)= explode('-', $date);
            ?>
            <tr id="tr<?php echo $c->id ?>">
              <td class="text-uppercase"><button class="btn btn-default">#<?php echo $c->id ?><?php echo $ano ?></button></td>
              <td class="text-center">
                <?php
                $fecha = $c->fecha_hora_asignado_consignado;
                list($date,$hora) = explode(' ', $fecha);
                list($ano,$mes,$dia)= explode('-', $date);
                echo $dia.'/'.$mes.'/'.$ano;
                ?>
              </td>
              <td class="text-uppercase">V-<?php echo $c->solicitante->cedula ?></td>
              <td class="text-uppercase">V-<?php echo $c->solicitante->nombre_apellido ?></td>
              <td class="text-uppercase"><?php echo $c->solicitante->telefono1 ?></td>
              <td class="text-uppercase"><?php echo $c->solicitante->telefono2 ?></td>
              <td class="text-uppercase">
                <a class="btn btn-default" href="<?php echo baseUrl ?>admin/solicitudes/<?php echo $c->id ?>"><i class="fa fa-search text-primary"></i></a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <div class="text-center">
          <?php echo Paginator($solicitudes,7); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (isset($noEncontrado)): ?>
  <script>
swal({
  title: 'No se encuentra',
  text: "Quiere ingresar al solicitante al sistema?.",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No'
}).then(function () {
  swal(
    'Ok!',
    'En el siguiente formulario ingrese los datos del solicitante.',
    'info'
  )
  window.location.href = "<?php echo baseUrl ?>admin/consultas/solicitante_ingresar?cedula=<?php echo $noEncontrado ?>";
}, function (dismiss) {
  // dismiss can be 'cancel', 'overlay',
  // 'close', and 'timer'
  if (dismiss === 'cancel') {
    window.location.href = "<?php echo baseUrl ?>admin/consultas/solicitante";
  }
})
  </script>
<?php endif ?>
