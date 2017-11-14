
<div class="row">
  <br>
  <form action="<?php echo baseUrl ?>auth/login/verificar" method="POST" >
    <?php echo Token::field() ?>
    <div class="col s12 m4 offset-m4 card-panel z-depth-2">
      <div class="center-align">
      <br>
      </div>
<div class="row">
<div class="col s12">
           <div class='input-field'>
          <input class='validate' type='text' name='username' id='email' />
          <label for='email'><i class="fa fa-user fa-2x"></i> USUARIO</label>
        </div>


        <div class='input-field'>
          <input class='validate' type='password' name='password' id='password' />
          <label for='password'><i class="fa fa-lock fa-2x"></i> CLAVE</label>
        </div>
</div>

  
</div>

      <div class="row">
      <div class="col s8">
          <div class="g-recaptcha" data-sitekey="6Lf0ETMUAAAAAG37bxcuFp19Ut5n2Uowmv0Zp2bP"></div>
      </div>
      <div class="col s4">
        <button type='submit' name='btn_login' class='col s12 m12 btn btn-large waves-effect red'><i class="fa fa-external-link-square" aria-hidden="true"></i>
        Login</button>
      </div>


      </div>
      <style>
.g-recaptcha {
width: desired_width;
height: 54px;
border-radius: 4px;
border-right: 1px solid #d8d8d8;
overflow: hidden;
border-bottom: 1px solid #D3D3D3;
}

      </style>
    </div>
  </form>
</div>