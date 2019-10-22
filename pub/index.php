<?php
declare(strict_types=1);

require_once './../src/Core/Autoload.php';
$autoloader = new \Core\Autoload();
spl_autoload_register([$autoloader, 'load']);

$env = new \Core\Env();
$env->initEnvironment();

$menu = [
    'Home',
    'Shop',
    'Blog'
];

ob_start();
require 'template.phtml';
$html = ob_get_clean();


header('Content-Type: text/html;');

echo $html;
