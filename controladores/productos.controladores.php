<?php

class ControladorProductos{

    /*=============================================
    MOSTRAR PRODUCTOS
    =============================================*/

    static public function ctrMostrarProductos($item, $valor, $orden){

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

        return $respuesta;

    }

    /*=============================================
    CREAR PRODUCTO
    =============================================*/

    static public function ctrCrearProducto(){

        if(isset($_POST["nuevaDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
               preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&    
               preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
               preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])){

                /*=============================================
                VALIDAR IMAGEN
                =============================================*/
                if(isset($_FILES["nuevaImagen"]["tmp_name"]) && !empty($_FILES["nuevaImagen"]["tmp_name"])) {
                    // Procesar la imagen aquí
                    $ruta = self::subirImagen($_FILES["nuevaImagen"], $_POST["nuevoCodigo"]);
                } else {
                   
                    $ruta = "vistas/img/productos/default/anonymous.png";
                }

                $tabla = "productos";

                $datos = array("id_categoria" => $_POST["nuevaCategoria"],
                               "codigo" => $_POST["nuevoCodigo"],
                               "descripcion" => $_POST["nuevaDescripcion"],
                               "stock" => $_POST["nuevoStock"],
                               "precio_compra" => $_POST["nuevoPrecioCompra"],
                               "precio_venta" => $_POST["nuevoPrecioVenta"],
                               "imagen" => $ruta);

                $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                        swal({
                              type: "success",
                              title: "El producto ha sido guardado correctamente",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                        if (result.value) {

                                        window.location = "productos";

                                        }
                                    })

                        </script>';

                }


            }else{

                echo'<script>

                    swal({
                          type: "error",
                          title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "productos";

                            }
                        })

                  </script>';
            }
        }
    }

    /*=============================================
    SUBIR IMAGEN
    =============================================*/
    static private function subirImagen($imagen, $codigo){
        $directorio = "vistas/img/productos/".$codigo;
        mkdir($directorio, 0755);

        $tipo = $imagen["type"];
        $nombre_temporal = $imagen["tmp_name"];

        if($tipo == "image/jpeg"){
            $aleatorio = mt_rand(100,999);
            $ruta = "vistas/img/productos/".$codigo."/".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($nombre_temporal);
        }
        else if($tipo == "image/png"){
            $aleatorio = mt_rand(100,999);
            $ruta = "vistas/img/productos/".$codigo."/".$aleatorio.".png";
            $origen = imagecreatefrompng($nombre_temporal);
        }

        $nuevoAncho = 500;
        $nuevoAlto = 500;
        list($ancho, $alto) = getimagesize($nombre_temporal);

        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

        imagedestroy($origen);

        imagejpeg($destino, $ruta);

        return $ruta;
    }

    /*=============================================
    EDITAR PRODUCTO
    =============================================*/

    static public function ctrEditarProducto(){

        if(isset($_POST["editarDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
               preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&    
               preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
               preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

                /*=============================================
                VALIDAR IMAGEN
                =============================================*/

                $ruta = $_POST["imagenActual"];

                if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){
                    $ruta = self::subirImagen($_FILES["editarImagen"], $_POST["editarCodigo"]);
                }

                $tabla = "productos";

                $datos = array("id_categoria" => $_POST["editarCategoria"],
                               "codigo" => $_POST["editarCodigo"],
                               "descripcion" => $_POST["editarDescripcion"],
                               "stock" => $_POST["editarStock"],
                               "precio_compra" => $_POST["editarPrecioCompra"],
                               "precio_venta" => $_POST["editarPrecioVenta"],
                               "imagen" => $ruta);

                $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

                        swal({
                              type: "success",
                              title: "El producto ha sido editado correctamente",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                        if (result.value) {

                                        window.location = "productos";

                                        }
                                    })

                        </script>';

                }


            }else{

                echo'<script>

                    swal({
                          type: "error",
                          title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {

                            window.location = "productos";

                            }
                        })

                  </script>';
            }
        }

    }

    /*=============================================
    BORRAR PRODUCTO
    =============================================*/
    static public function ctrEliminarProducto(){

        if(isset($_GET["idProducto"])){

            $tabla ="productos";
            $datos = $_GET["idProducto"];

            if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/anonymous.png"){

                unlink($_GET["imagen"]);
                rmdir('vistas/img/productos/'.$_GET["codigo"]);

            }

            $respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "El producto ha sido borrado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "productos";

                                }
                            })

                </script>';

            }        
        }


    }

    /*=============================================
    MOSTRAR SUMA VENTAS
    =============================================*/

    static public function ctrMostrarSumaVentas(){

        $tabla = "productos";

        $respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

        return $respuesta;

    }
}
?>
