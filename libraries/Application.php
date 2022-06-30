<?php


class Application{
    public static function process(){
        $controllerName = "Article"; // j'appelle controller Article
        $task = "index"; // j'appelle controller index

        if(!empty($_GET['controller'])){ // Si controller n'est pas vide, alors controllerName = ce qu'il y a dans $_GET.
            $controllerName = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['task'])){ // Si controller n'est pas vide, alors controllerName = ce qu'il y a dans $_GET.
            $task = $_GET['task'];
        }

        $controllerName = "\Controllers\\" . $controllerName;
        $controller = new $controllerName;
        $controller->$task();

    }
}