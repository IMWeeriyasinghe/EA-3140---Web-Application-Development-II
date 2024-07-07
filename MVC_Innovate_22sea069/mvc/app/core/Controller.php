<?php
// app/core/Controller.php

class Controller {
    public function view($view, $data = []) {
        if (is_array($data)) {
            extract($data);  // Convert array keys to variables
        }
        require_once '../app/views/' . $view . '.php';
    }
}
