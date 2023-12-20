<?php
require_once __DIR__ . '/../database/QueryBuilder.class.php';
require_once __DIR__ . '\CategoriasRepository.php';

class ImagenesRepository extends QueryBuilder
{
    /**
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table = 'imagenes', string $classEntity = 'Imagen')
    {
        parent::__construct($table, $classEntity);
    }

    /**
     * @param ImagenGaleria $imagenGaleria
     * @return Categoria
     * @throws NotFoundException
     * @throws QueryException
     */
    public function getCategoria(Imagen $imagenGaleria): Categoria
    {
        $categoriaRepository = new CategoriasRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }
}
