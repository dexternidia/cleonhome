<div id="panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title text-muted"><i class="fa fa-pencil-square fa-2x"></i> EDICION DEL MODULO admin<b></b>
    </h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-lg-12">
        <form action="<?php echo baseUrl ?>admin/Cuentas/<?php echo $id ?>" method="POST">
          <?php echo Token::field() ?>
          <input class="form-control" type="text" name="nombre" placeholder="NOMBRE">
          <br>
          <input class="form-control" type="text" name="apellido" placeholder="APELLIDO">
          <br>
          <button class="btn btn-primary" type="submit">ACTUALIZAR</button>
        </form>
      </div>
    </div>
  </div>
</div>
