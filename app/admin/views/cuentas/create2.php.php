<script language="javascript">
$(document).ready(function(){
$("#municipioSelect").change(function () {
$("#municipioSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idMunicipio = $(this).val();
alert(idMunicipio);
$.get("<?php echo baseUrlRole() ?>cuentas/parroquiasCne", { idMunicipio:idMunicipio }, function(data){
$("#ParroquiaSelect").html(data);
});
});
})
});
</script>
<script language="javascript">
$(document).ready(function(){
$("#ParroquiaSelect").change(function () {
$("#ParroquiaSelect option:selected").each(function () {
//organismo_id = $(this).val();
//id1 = $(this).val();
var idParroquia = $(this).val();
//alert(idParroquia);
$.get("<?php echo baseUrlRole() ?>cuentas/mesasCne", { idParroquia:idParroquia }, function(data){
$("#MesasSelect").html(data);
});
});
})
});
</script>




<div id="panel" class="panel panel-primary">
  <div class="panel-heading" style="background-color: red">
    <h3 class="panel-title text-muted"><i class="fa fa-users fa-2x"></i> CUENTAS<b></b>
    <a class="btn btn-default pull-right" href="<?php echo baseUrlRole() ?>estructuras/create"><i class="fa fa-plus-square text-muted"></i><i style="color:#777;"> Agregar CUENTAS</i></a>    </h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <form id="formCheckPassword" action="<?php echo baseUrl ?>admin/cuentas" method="POST">
          <?php echo Token() ?>
          <div class="col-lg-12">
            <div class="col-lg-4">
              <input class="form-control" type="text" name="name" placeholder="APELLIDO Y NOMBRE">
            </div>
            <div class="col-lg-4">
              <select id="municipioSelect" class="form-control" name="organismo_id" required/>
                <option value="">ORGANISMOS</option>
                <?php foreach ($organismos as $key => $or): ?>
                <option value="<?php echo $or->id ?>"><?php echo $or->nombre ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-lg-4">
              <select name="role" class="form-control" name="role" id="">
                <option value="admin">UBCH</option>
                <option value="aliado">ADMIN</option>
                <option value="operador">OPERADOR</option>
              </select>
            </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="municipioSelect" class="form-control" name="id_municipio" required/>
              <?php
              use App\MunicipioCne;
              $municipios = MunicipioCne::all();
              ?>
              <option>MUNICIPIOS</option>
              <option></option>
              <?php foreach ($municipios as $municipio): ?>
              <option value="<?php echo $municipio->id_municipio ?>"><?php echo $municipio->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <select id="ParroquiaSelect" class="form-control" name="id_parroquia" required/>
            </select>
          </div>
        </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <div class="col-lg-12">
            <div class="col-lg-4">
              <input class="form-control" type="text" name="email" placeholder="USUARIO">
            </div>
            <div class="col-lg-4">
              <input id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'tiene que tener minimo 6 caracteres.' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="CLAVE" required>
            </div>
            <div class="col-lg-4">
              <input id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'La clave no coinciden.' : '');" placeholder="VERIFICAR CLAVE" required>
            </div>
            <br>
            <br>
            <button class="btn btn-danger pull-right" type="submit"><i class="fa fa-save fa-2x"></i></button>
          </form>
        </div>
      </div>
    </div>
    <script>
    $("#formCheckPassword").validate({
    rules: {
    password: {
    required: true,
    minlength: 6,
    maxlength: 10,
    } ,
    cfmPassword: {
    equalTo: "#password",
    minlength: 6,
    maxlength: 10
    }
    },
    messages:{
    password: {
    required:"the password is required"
    }
    }
    });
    </script>