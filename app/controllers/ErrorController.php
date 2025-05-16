<?php

class ErrorController
{
    public function error404()
    {        
        require_once __DIR__ . '/../views/errors/404.php';
    }

    public function error403()
    {        
        require_once __DIR__ . '/../views/errors/403.php';
    }
}
