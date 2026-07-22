<?php
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';

// Load Config
require_once 'config/config.php';
// Load Helpers
require_once 'helpers/helpers.php';

// Autoload Core Classes
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
