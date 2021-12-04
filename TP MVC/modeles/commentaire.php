<?php
require_once 'framework/modele.php';
class Commentaire extends Modele
{
    // Renvoie la liste des commentaires associés à une recette
    public function getCommentaires($idRecette)
    {
        $sql = 'SELECT * FROM commentaire';
        $commentaires = $this->executerRequete($sql)->fetchAll();
        return $commentaires;
        // code à implémenter
        // retourne la liste des commentaires
        // utiliser pour cela executerRequete avec la requête SQL
        // Ajoute un commentaire dans la base
    }
    
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
