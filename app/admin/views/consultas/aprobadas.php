<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-clipboard fa-2x"></i> SOLICITUD</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form id="formulario" method="GET" action="">
          <div class="col-md-6">
            <select name="tipo" class="form-control" onchange="this.form.submit()">
              <option value="1">TIPO SOLICITUD</option>
              <option value="">TODAS</option>
              <option value=""></option>
              <?php foreach ($tipos as $key => $t): ?>
              <option class="text-uppercase" value="<?php echo $t->id ?>"><?php echo $t->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-md-6">
            <a class="btn btn-primary pull-right" href="<?php echo baseUrl ?>reportes/aprobadas"><i class="fa fa-file-pdf-o"></i> Generar PDF</a>
          </div>
        </form>
      </div>
    </div>
    <br>
    <h5 class="text-muted text-primary text-center text-uppercase">
    <i class="fa fa-check" aria-hidden="true"></i>
    <?php if (isset($tipo_seleccion) and $tipo_seleccion): ?>
    <a class="text-primary"><?php echo $tipo_seleccion->nombre ?> APROBADAS</a>
    <?php else: ?>
     SOLICITUDES APROBADAS
    <?php endif ?>
    </h5>
    <div class="row">
      <div class="col-md-12 table-responsive">
        <table class="table table-striped table-condensed animated fadeIn" data-striped="true">
          <thead>
            <tr class="bg-primary text-white">
              <th width="5%" class="text-uppercase">Solicitud</th>
              <th width="5%" class="text-uppercase">Fecha</th>
              <th width="10%" class="text-uppercase">Cédula</th>
              <th width="22%" class="text-uppercase">Solicitante</th>
              <th class="text-uppercase">Telefono n°1</th>
              <th class="text-uppercase">Telefono n°2</th>
              <th width="1%" class="text-uppercase">Ver</th>
              <th width="1%" class="text-uppercase">Entregar</th>
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
              <td class="text-uppercase"><button class="btn btn-default"><?php echo $c->id ?><?php echo $ano ?></button></td>
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
              <td>
                <form action="<?php echo baseUrl ?>admin/solicitudes/entregar" method="GET">
                <input cla type="hidden" name="solicitud_id" value="<?php echo $c->id ?>">
                <button onclick="" type="submit" class="btn btn-success change-icon">
                <i class="fa fa-share-square"></i>
                <i class="fa fa-share-square-o"></i>
                </button>                  <style>
                .change-icon > .fa + .fa,
                .change-icon:hover > .fa {
                display: none;
                }
                .change-icon:hover > .fa + .fa {
                display: inherit;
                }
                </style>
                </form>
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