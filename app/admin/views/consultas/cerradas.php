<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-clipboard fa-2x"></i> SOLICITUD</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <form id="formulario" method="GET" action="">
          <div class="col-lg-3">
            <div class="form-group">
              <select id="municipioSelect" class="form-control" name="municipio_id"/>
                <?php
                use App\Municipio;
                $municipios = Municipio::all();
                ?>
                <?php if(isset($municipio_seleccion) and $municipio_seleccion): ?>
                <?php $municipio_solicitante = Municipio::find($municipio_seleccion); ?>
                <option value="<?php echo $municipio_solicitante->id ?>"><?php echo $municipio_solicitante->nombre ?></option>
                <option value="">MUNICIPIOS</option>
                <option value=""></option>
                <?php else: ?>
                <option value="">MUNICIPIOS</option>
                <?php endif ?>
                <option value=""></option>
                <?php foreach ($municipios as $municipio): ?>
                <option value="<?php echo $municipio->id ?>"><?php echo $municipio->nombre ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-group">
              <select id="parroquiaSelect" class="form-control" name="parroquia_id"/>
                <?php
                use App\Parroquia;
                $parroquias = Parroquia::all();
                ?>
                <?php if (isset($parroquia_seleccion) and $parroquia_seleccion): ?>
                <?php $parroquia_solicitante = Parroquia::find($parroquia_seleccion); ?>
                <option value="<?php echo $parroquia_solicitante->id ?>"><?php echo $municipio_solicitante->nombre ?></option>
                <option value="">PARROQUIAS</option>
                <option value=""></option>
                <?php else: ?>
                <option value="">PARROQUIAS</option>
                <?php endif ?>
                <option value=""></option>
                <?php foreach ($parroquias as $parroquia): ?>
                <option value="<?php echo $parroquia->id ?>"><?php echo $parroquia->nombre ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <select name="tipo" class="form-control text-uppercase">
              <!--  <select name="tipo" class="form-control" onchange="this.form.submit()"> -->
              <?php if ($tipo_seleccion): ?>
              <option class="text-uppercase" value="<?php echo $tipo_seleccion->id ?>"><?php echo $tipo_seleccion->nombre ?></option>
              <?php else: ?>
              <option value="1">TIPO SOLICITUD</option>
              <?php endif ?>
              <option value="">TODAS</option>
              <option value=""></option>
              <?php foreach ($tipos as $key => $t): ?>
              <option class="text-uppercase" value="<?php echo $t->id ?>"><?php echo $t->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-md-3">
            <button class="btn btn-primary fa fa-search btn-lg"></button>
          </div>
        </form>
      </div>
    </div>
    <br>
    <h5 class="text-muted text-primary text-center text-uppercase">
    <i class="fa fa-folder-open-o" aria-hidden="true"></i>
    <?php if (isset($tipo_seleccion) and $tipo_seleccion): ?>
    <a class="text-primary"><?php echo $tipo_seleccion->nombre ?> CERRADAS</a>
    <?php else: ?>
     SOLICITUDES CERRADAS
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