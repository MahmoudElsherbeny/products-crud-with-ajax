<?php 

namespace App\Core;

class Router
{
    public static function run(string $url, array $routes)
    {
        $uri = parse_url($url);
        $path = $uri['path'];

        if(array_key_exists($path, $routes) === false) {
            return;
        }

        $callback = $routes[$path];

        $params = [];
        if(!empty($uri['query'])) {
            parse_str($uri['query'], $params);
        }

        $callback($params);
    }
}