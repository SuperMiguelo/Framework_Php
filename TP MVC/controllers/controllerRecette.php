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
    public function ajouterCommentaire($idRecette, $auteur, $contenu, $note, $dateCreation)
    {
        $requete = "INSERT INTO commentaire(idRecette, auteur, contenu, note, dateCreation) VALUES(:idRecette, :auteur, :contenu, :note, :dateCreation)";
        $this->executerRequete($requete,
            ["idRecette" => $idRecette,
                "auteur" => $auteur,
                "contenu" => $contenu,
                "note" => $note,
                "dateCreation" => $dateCreation,
            ]);
        header("refresh: 0; url = index.php?controller=recette&action=recette&id=$idRecette");
    }
}
