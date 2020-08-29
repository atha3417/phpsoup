<?php

class Route
{
    protected $controller = 'Default';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // memanggil file route
        require_once "../app/Config/routes.php";

        // memasukkan $this->controller dari file route.php
        $this->controller = $route['default_controller'];

        // memecah url menjadi array
        if (isset($_GET['url'])) {
            $url = explode('/', filter_var(trim($_GET['url']), FILTER_SANITIZE_URL));
        } else {
            $url[0] = $route['default_controller'];
        }

        // cek file controller
        if (file_exists('../app/Controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
        } else {
            return require_once '../app/Views/' . $route['error_404'];
        }

        // memanggil controller
        require_once '../app/Controllers/' . $this->controller . '.php';

        // instansiasi objek
        $this->controller = new $this->controller;

        // mengecek metode controller
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
            } else {
                return require_once '../app/Views/' . $route['error_404'];
            }
        }

        // menghapus $url[0] dan $url[1]
        unset($url[0]);
        unset($url[1]);

        // memasukkan $this->params
        $this->params = $url;

        // memanggil fungsi
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}
