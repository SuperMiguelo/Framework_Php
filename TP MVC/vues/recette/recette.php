<?php
var_dump($recette);
var_dump($ingredients);

echo('<div id="global">
    <article>
        <header>
            <img class="imgRecette" src="img/'.$recette['photo'].'" alt="Tartiflette" />
            <h1 class="titreRecette">
                '.$recette['titre'].'
            </h1>
            <time>
                '.substr($recette['dateCreation'],0,11).'
            </time>
        </header>
        <p>
            '.$recette['description'].'
        </p>
    </article>
    <hr />
    <header>
        <h2 id="titreIngredient">
            Ingrédients
        </h2>
        <ul>');
foreach($ingredients as $element){
    echo '<li>'.$element['quantite'].' '.$element['unit'].' '.$element['nom'].'</li>';
}
echo('
        </ul>
    </header>
    <h2 id="titreCommentaire">
        Commentaires
    </h2>
    <div class="divCommentaire">
        <p>Nicolas : Super recette </p>
        <p> Note : 5/5 </p>
        <p>
            09/01/2019
        </p>
        <hr>
    </div>
    <form method="post" action="index.php?controller=recette&action=commenter&id=id
    recette">
        <input id="auteur" name="auteur" type="text" placeholder="Votre Nom" /><br />
        <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre
    commentaire"></textarea><br />
        <label for="note">Note</label><br />
        <select name="note" id="note">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br />
        <input type="submit" value="Commenter" />
    </form>
    <div id="erreur">
        <p> Erreurs </p>
    </div>
    </div>');
