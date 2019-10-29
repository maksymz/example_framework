<?php
declare(strict_types=1);

require './../vendor/autoload.php';

$diContainer = new \Core\DIContainer();

/** @var \Core\Env $env */
$env = $diContainer->get(\Core\Env::class);
$env->initEnvironment();

$router = $diContainer->get(\Http\RouterPool::class);
$router->resolve();