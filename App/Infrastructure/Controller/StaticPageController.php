<?php

namespace App\Infrastructure\Controller;

use App\Infrastructure\Application;

class StaticPageController
{
    public static function serveHome($req, $res)
    {
        return $res->sendResponse(
            Application::getService("view")->serve("home.php", [
                'title' => 'hello world'
            ])
        );
    }
}
