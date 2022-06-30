<?php

class Renderer{

    // render('articles/show')
public static function render(string $path, array $variable = []){

    extract($variable);
    ob_start();
    require('templates/' . $path . '.html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');
}
}