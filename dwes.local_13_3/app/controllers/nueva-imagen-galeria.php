<?php
require_once __DIR__ . '/../../src/utils/File.class.php';
require_once __DIR__ . '/../../src/excepciones/FileException.class.php';
require_once __DIR__ . '/../../src/excepciones/QueryException.class.php';
require_once __DIR__ . '/../../src/excepciones/AppException.class.php';
require_once __DIR__ . '/../../src/excepciones/CategoriaException.class.php';
require_once __DIR__ . '/../../src/entity/Imagen.class.php';
require_once __DIR__ . '/../../src/database/Connection.php';
require_once __DIR__ . '/../../src/repository/ImagenesRepository.php';
require_once __DIR__ . '/../../src/repository/CategoriasRepository.php';

$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";

try {
    $titulo = trim(htmlspecialchars($_POST['titulo']));
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));
    if (empty($categoria))
        throw new CategoriaException;

    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
    $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
    $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
    $imagenesRepository = new ImagenesRepository();
    $imagenesRepository->guarda($imagenGaleria);
    $mensaje = "Se ha guardado la imagen correctamente";

} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} catch (CategoriaException) {
    $errores[] = "No se ha seleccionado una categoría válida";
}

App::get('router')->redirect('galeria');
