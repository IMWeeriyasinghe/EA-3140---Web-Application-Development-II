<?php
// app/core/App.php

class App {
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();
        var_dump($url);  // Debugging statement

        if (!empty($url[0]) && file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            echo "Controller not found: " . (isset($url[0]) ? $url[0] : 'none') . "\n";
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (!empty($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        } else {
            echo "Method not found: " . (isset($url[1]) ? $url[1] : 'none') . "\n";
        }

        $this->params = $url ? array_values($url) : [];
        var_dump($this->params);  // Debugging statement

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
