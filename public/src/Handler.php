<?php

namespace FrankenSkeleton;

use Symfony\Component\HttpFoundation\Request;

class Handler
{
    public string $html;

    /**
     * Get HTML and turn it into PDF.
     *
     * @return void 
     */
    public function get(Request $request)
    {
        echo <<<HTML
        <!DOCTYPE html>
        <html>

        <head>
            <title>It works!</title>
        </head>
        <body>
            <p>🎉</p>
        </body>
        </html>
        HTML;
    }

    /**
     * @return void 
     */
    public function options(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Content-type: application/json");
    }
}
