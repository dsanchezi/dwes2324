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

$errores=[]; $titulo=""; $descripcion=""; $mensaje="";

try {
    $imagenesRepository = new ImagenesRepository();
    $imagenes = $imagenesRepository->findAll();
    
    $categoriasRepository = new CategoriasRepository();
    $categorias = $categoriasRepository->findAll();
    
}
catch ( QueryException $queryException ){
    $errores[] = $queryException->getMessage();
}
catch ( AppException $appException ){
    $errores[] = $appException->getMessage();
}
catch ( CategoriaException ) {
    $errores[] = "No se ha seleccionado una categoría válida";
}
catch ( Exception $error) {
    $errores[] = $error->getMessage();
}
   

require_once __DIR__ . '/../views/galeria.view.php';

