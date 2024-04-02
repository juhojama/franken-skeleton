<?php

require_once __DIR__ . '/vendor/autoload.php';

use FrankenSkeleton\Handler;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;

$finder = new Finder();
$finder->in('./src/');

if ($finder->hasResults()) {
    foreach ($finder as $file) {
        require_once $file->getRealPath();
    }
}

$handler = new Handler();

while (true) {
    \frankenphp_handle_request(static function () use ($handler, $logger) {
        $request = Request::createFromGlobals();

        switch ($request->getMethod()) {
            case 'GET':
                $handler->get($request);
                break;
            case 'OPTIONS':
                $handler->options($request);
                break;
        }
    });
}
