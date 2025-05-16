<?php
require __DIR__ . '/../helpers/url_helper.php';

class Controller
{
    public function model($model)
    {
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        extract($data); // make variables accessible in view
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
