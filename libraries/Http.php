<?php


// class pour les requetes, reponse et faire des redirection (tout en rapport avec http)

class Http{

    // fonction pour rediriger vers ...
public static function redirect(string $url): void{

    header("Location: $url");
    exit();
}
}