<?php
require_once 'framework/modele.php';

class Recette extends Modele
{
    // Renvoie la liste des recettes du blog
    public function getRecettes()
    {
        $sql = 'SELECT * FROM recette';
        $recettes = $this->executerRequete($sql)->fetchAll();
        return $recettes;
    }

    //Renvoie les informations sur une recette 
    public function getRecette($idRecette)
    {
        $sql = 'SELECT * FROM recette'
            . ' WHERE id = ?';
        $recette = $this->executerRequete($sql, array($idRecette))->fetchAll();
        return $recette;
    }

    // Renvoie les ingrédients d'une recette
    public function getIngredients($idRecette)
    {
        $sql = 'SELECT * FROM ingredient'
            . ' WHERE idRecette = ?';
        $ingredients = $this->executerRequete($sql, array($idRecette))->fetchAll();
        return $ingredients;
        }
}