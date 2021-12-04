<?php

require_once 'modeles/recette.php';
require_once 'modeles/commentaire.php';
require_once 'framework/controller.php';
require_once 'framework/vue.php';

class ControllerRecette extends Controller
{
    private $recette;
    private $commentaire;
    public function __construct()
    {
        $this->recette = new Recette();
        $this->commentaire = new Commentaire();
    }
    public function index()
    {
        $recette = $this->recette->getRecette(1);
        $this->genererVue(array('recette' => $recette));
        // Affiche les détails sur une recette
    }
    public function recette()
    {
        $id= $_GET['id'];
        $recette = $this->recette->getRecette($id);
        $ingredients = $this->recette->getIngredients($id);
        $this->genererVue(array('recette' => $recette,'ingredients' => $ingredients));

    }
    // Ajoute un commentaire à une recette
    public function commenter()
    {
        // récupérer les paramètres (idRecette, auteur, contenu, note)
        // Sauvegarde du commentaire
        // Actualisation de l'affichage de la recette
    }
}
