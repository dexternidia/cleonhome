<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
//alert(tipo_id);
$.get("<?php echo baseUrl ?>admin/solicitantes/parroquias", { idMunicipio:idMunicipio }, function(data){
$("#ParroquiaSelect").html(data);
});
});
})
});

</script>

<script language="javascript">
$(document).ready(function(){
var inputEmail = $("#inputEmail").val();
//alert(tipo_id);
$.get("<?php echo baseUrl ?>admin/solicitantes/parroquias", { idMunicipio:idMunicipio }, function(data){
$("#ParroquiaSelect").html(data);
});
});

$('#IngresarSolicitante').click(function () {
      $(":input").each(function(){
          this.value = this.value.toUpperCase();          
      });
});


function enviar(argument) {
  var email = $("#inputEmail").val();
  //alert(inputEmail);
$.get("<?php echo baseUrl ?>admin/solicitantes/verificar_email", { email:email }, function(existe){

if(existe == true) {
  swal(
  'Error...',
  'El email ya esta registrado por solicitante.',
  'error'
)
} 
else {
$("#IngresarSolicitante").submit();
}
});
}
</script>


<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-user-plus fa-2x"></i> INGRESAR DATOS PERSONALES</h3>
  </div>
  <br>
  <div class="panel-body">
    <form action="<?php echo baseUrl ?>admin/consultas/solicitante_ingresar_proceso" method="POST">
      <?php echo Token::field() ?>
      <input type="hidden" name="fecha_hora_registro" value="<?php echo \Carbon\Carbon::now(); ?>">
      <div class="row">
        <div class="col-lg-2">
          <div class="form-group">
            <?php if (isset($solicitante->nacionalidad)): ?>
            <select class="form-control" name="nacionalidad" required readonly/>
              <option value="<?php echo $solicitante->nacionalidad ?>"><?php echo $solicitante->nacionalidad ?></option>
            </select>
            <?php else: ?>
            <select class="form-control" name="nacionalidad" required/>
              <option value="">Nacionalidad</option>
              <option value=""></option>
              <option value="V">V</option>
              <option value="E">E</option>
            </select>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <?php if (isset($solicitante->cedula)): ?>
            <input class="form-control" type="text" name="cedula" placeholder="Cédula" value="<?php echo $solicitante->cedula ?>" required readonly>
            <?php else: ?>
            <input class="form-control" type="text" name="cedula" value="<?php echo $cedula ?>" placeholder="Cédula" required/>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <?php if (isset($solicitante->nombre_apellido)): ?>
            <input class="form-control text-uppercase" type="text" name="nombre_apellido" placeholder="Nombre y Apellido" value="<?php echo $solicitante->nombre_apellido ?>" required readonly/>
            <?php else: ?>
            <input class="form-control" type="text" name="nombre_apellido" placeholder="Nombre y Apellido" required/>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <?php if (isset($solicitante->fecha_nacimiento)): ?>
            <input class="form-control" type="text" name="fecha_nacimiento" placeholder="Fecha nacimiento" value="<?php echo $solicitante->fecha_nacimiento ?>" required readonly>
            <?php else: ?>
            <input class="form-control" type="text" data-inputmask="'mask': '99/99/9999'" name="fecha_nacimiento" placeholder="Fecha nacimiento" required/>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input id="inputEmail" class="form-control" type="email" name="email" placeholder="Email"/>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" data-inputmask="'mask': '(9999) 999-9999'" type="text"  name="telefono1" placeholder="Telefono n°1" required/>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <input class="form-control" data-inputmask="'mask': '(9999) 999-9999'" type="text" name="telefono2" placeholder="Telefono n°2"/>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select class="form-control" name="organismo_id" required/>
              <?php
              use App\Ente;
              $entes = Ente::all();
              ?>
              <option value="">ORGANISMOS  </option>
              <option value="">-----------------</option>
              <?php foreach ($entes as $en): ?>
              <option value="<?php echo $en->id ?>"><?php echo $en->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="municipioSelect" class="form-control" name="municipio_id" required/>
              <?php
              use App\Municipio;
              $municipios = Municipio::all();
              ?>
              <?php if(isset($solicitante->municipio)): ?>
              <?php $municipio_solicitante = Municipio::find($solicitante->municipio); ?>
              <option value="<?php echo $municipio_solicitante->id ?>"><?php echo $municipio_solicitante->nombre ?></option>
              <?php else: ?>
              <option value="">MUNICIPIOS</option>
              <?php endif ?>
              <option value="">-----------------</option>
              <?php foreach ($municipios as $municipio): ?>
              <option value="<?php echo $municipio->id ?>"><?php echo $municipio->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="ParroquiaSelect" class="form-control" name="parroquia_id" required/>
              <?php
              use App\Parroquia;
              $parroquias = Parroquia::all();
              ?>
              <?php if (isset($solicitante->parroquia)): ?>
              <?php $parroquia_solicitante = Parroquia::find($solicitante->parroquia); ?>
              <option value="<?php echo $parroquia_solicitante->id ?>"><?php echo $municipio_solicitante->nombre ?></option>
              <?php else: ?>
              <option value="">PARROQUIAS</option>
              <?php endif ?>
              <option value="">-----------------</option>
              <?php foreach ($parroquias as $parroquia): ?>
              <option value="<?php echo $parroquia->id ?>"><?php echo $parroquia->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <?php if (isset($solicitante->urbanizacion_barrio)): ?>
            <input class="form-control" type="text" name="urbanizacion_barrio" placeholder="Urbanización/Barrio" value="<?php echo $solicitante->urbanizacion_barrio ?>" required/>
            <?php else: ?>
            <input class="form-control" type="text" name="urbanizacion_barrio" placeholder="Urbanización/Barrio" required/>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <?php if (isset($solicitante->avenida_calle)): ?>
            <input class="form-control text-uppercase" type="text" name="avenida_calle" placeholder="Avenida/Calle" value="<?php echo $solicitante->avenida_calle ?>" required/>
            <?php else: ?>
            <input class="form-control" type="text" name="avenida_calle" placeholder="Avenida/Calle" required/>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <?php if (isset($solicitante->casa_edificio_apartamento)): ?>
            <input class="form-control text-uppercase" type="text" name="casa_edificio_apartamento" placeholder="Casa/Edificio/Apartamento" value="<?php echo $solicitante->casa_edificio_apartamento ?>" required/>
            <?php else: ?>
            <input class="form-control text-uppercase" type="text" name="casa_edificio_apartamento" placeholder="Casa/Edificio/Apartamento" required/>
            <?php endif ?>
          </div>
        </div>
      </div>
      <br>
      <button onclick="enviar()" id="botonSubmit" type="submit" class="btn btn-lg btn-primary pull-right"><i class="fa fa-save fa-2x"></i></button>
    </form>
  </div>
</div>