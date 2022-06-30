<?php

namespace Models;

// abstract me permet de rendre la class Model abstraite, elle ne s'utilise pas en elle même on ne risque donc pas de l'appeler par erreur
abstract class Model{ 
    /*
    // Je creer un constructeur pour initialisier ma connexion à toutes les class qui EXTENDS vers Model.
    */
    protected $pdo;
    protected $table;
    public function __construct(){
        $this->pdo = \Database::getPdo();
    }

    /*
    retoure les tous les articles classé par date de création
    @return un array
    */
    public function findAll(?string $order = "") : array{
        $sql = "SELECT * FROM {$this->table}";

        if($order){
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();
        return $articles;
    }

    public function find(int $id){

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        // On exécute la requête en précisant le paramètre :id 
        $query->execute(['id' => $id]);
        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();
        return $item;
    }

    public function delete(int $id) : void{

        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}