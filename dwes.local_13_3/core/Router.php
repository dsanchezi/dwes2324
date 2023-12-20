<?php
require_once __DIR__ . "/../src/excepciones/NotFoundException.class.php";

class Router
{
    private $routes;

    private function __construct()
    {
        $this->routes = [
            'GET' => [],
            'POST' => []
        ];
    }

    /**
     * @param string $file
     * @return Router
     */
    public static function load(string $file): Router
    {
        $router = new Router();
        require $file;
        return $router;
    }

    /**
     * @param array $routes
     * @return void
     */
    /*public function define(array $routes): void
    {
        $this->routes = $routes;
    }*/
    public function get(string $uri, string $controller): void
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post(string $uri, string $controller): void
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct(string $uri, string $method): string
    {
        if (array_key_exists($uri, $this->routes[$method]))
            return $this->routes[$method][$uri];

        throw new NotFoundException("No se ha definido una ruta para la uri solicitada");
    }

    public function redirect(string $path)
    {
        header('location: /' . $path);
    }
}
