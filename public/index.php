<?php
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/Model.php';
require_once __DIR__ . '/../app/core/Database.php';

session_start();

$router = new Router();

// Load all route definitions
require_once __DIR__ . '/../routes/web.php';

// Start dispatching
$router->dispatch();
