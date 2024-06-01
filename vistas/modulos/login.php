<?php
require_once "modelos/conexion.php";

$logo_login = obtenerRutaLogo('logo_login');
$fondo_login = obtenerRutaLogo('fondo_login');

function obtenerRutaLogo($tipo) {
    $conexion = Conexion::conectar();

   
    $consulta = "SELECT $tipo FROM logos";
    $resultado = $conexion->query($consulta);

    if ($resultado->rowCount() > 0) {
       
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        return $fila[$tipo];
    } else {
       
        if ($tipo == 'logo_login') {
            return 'vistas/img/plantillas/login2.png'; 
            return 'vistas/img/plantillas/fondoInicio.png'; 
        }
    }
}
?>
<style>
    .login-page #back {
        position: absolute;
        top:0;
        left:0;
        width:100%;
        height:100vh;
        background: url("<?php echo $fondo_login; ?>");
        background-size:cover;
        overflow:hidden;
        z-index:-1;
    }
</style>
<div id="back"></div>
<div class="login-box">
  <div class="login-logo">
 <img src="<?php echo $logo_login; ?>" class="img-responsive"  alt="Logo login">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name=ingUsuario required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="contrasena" name=ingPassword required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <?php
        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        ?>
      </div>
    </form>
   </div>
</div>