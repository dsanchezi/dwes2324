<?php
require_once __DIR__ . '/../../src/utils/File.class.php';
require_once __DIR__ . '/../../src/excepciones/FileException.class.php';
require_once __DIR__ . '/../../src/entity/Asociado.class.php';
require_once __DIR__ . '/../../src/database/Connection.php';
require_once __DIR__ . '/../../src/repository/AsociadosRepository.php';

$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";

session_start();
try {

    $asociadosRepository = new AsociadosRepository();

    $no = trim(htmlspecialchars($_POST['nombre'])) ?? "";
    if ($no == "") {
        $mensaje = "Debe poner un nombre";
        $errores = [];
        $nombre = "";
        $descripcion = "";
    } else {
        /*if ( isset($_POST['captcha']) && ($_POST['captcha']!="")){
                if( $_SESSION['captchaGenerado'] != $_POST['captcha'] ){
                    $mensaje = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
                }else{*/
        $nombre = trim(htmlspecialchars($_POST['nombre'])) ?? "";
        $descripcion = trim(htmlspecialchars($_POST['descripcion'])) ?? "";

        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $logo = new File('logo', $tiposAceptados);  // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
        $logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);

        $asociado = new Asociado($nombre, $logo->getFileName(), $descripcion);
        $asociadosRepository->save($asociado);

        $mensaje = "Se ha guardado el asociado correctamente";
        /*}
            } else {
                $mensaje = "Introduzca el código de seguridad.";
            }*/
    }
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
}

App::get('router')->redirect('asociados');
