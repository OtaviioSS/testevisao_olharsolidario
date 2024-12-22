<?php

namespace src\util;



require 'vendor/autoload.php';



class Router extends RouteSwitch
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);

        if ($route === '') {
            $this->home();
        } else {
            $this->$route();
        }
    }
}
