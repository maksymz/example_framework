<?php
declare(strict_types=1);

require_once './../src/Core/Autoload.php';
$autoloader = new \Core\Autoload();
spl_autoload_register([$autoloader, 'load']);

$env = new \Core\Env();
$env->initEnvironment();

switch ($_SERVER['REQUEST_URI']) {
    case '/contact-us':
        $contentBlock = \ContactUs\Block\ContactForm::class;
        break;
    case '/shop':
        $contentBlock = \Catalog\Block\Category::class;
        break;
    default:
        $foo = false;
        break;
}

$view = new \Core\View();
$view->setContentBlock($contentBlock);
$html = $view->renderContent();

header('Content-Type: text/html;');

echo $html;
