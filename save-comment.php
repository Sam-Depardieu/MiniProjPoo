<?php
require_once('libraries/models/Model.php'); 
require('libraries/utils.php');
/**
 * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE EST REDIRIGER SUR L'ARTICLE !
 * 
 * On doit d'abord vérifier que toutes les informations ont été entrées dans le formulaire
 * Si ce n'est pas le cas : un message d'erreur
 * Sinon, on va sauver les informations
 * 
 * Pour sauvegarder les informations, ce serait bien qu'on soit sur que l'article qu'on essaye de commenter existe
 * Il faudra donc faire une première requête pour s'assurer que l'article existe
 * Ensuite on pourra intégrer le commentaire
 * 
 * Et enfin on pourra rediriger l'utilisateur vers l'article en question
 */

/**
 * 1. On vérifie que les données ont bien été envoyées en POST
 * D'abord, on récupère les informations à partir du POST
 * Ensuite, on vérifie qu'elles ne sont pas nulles
 */
// On commence par l'author
$author = null;
if (!empty($_POST['author'])) {
    $author = $_POST['author'];
}

// Ensuite le contenu
$content = null;
if (!empty($_POST['content'])) {
    // On fait quand même attention à ce que l'utilisateur n'essaye pas des balises html dans son commentaire
    $content = htmlspecialchars($_POST['content']);
}

// Enfin l'id de l'article
$article_id = null;
if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
    $article_id = $_POST['article_id'];
}

// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
if (!$author || !$article_id || !$content) {
    die("Votre formulaire a été mal rempli !");
}

/**
 * 2. Vérification que l'id de l'article pointe bien vers un article qui existe
 * Ca nécessite une connexion à la base de données puis une requête qui va aller chercher l'article en question
 * Si rien ne revient, on affiche une erreur!
 * 
 * Attention, on précise ici deux options :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violemment quand on fait une erreur ;-)
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 * 
 * PS : Ca fait plusieurs fois qu'on écrit ces lignes pour se connecter ?! 
 */
$article = findArticle($article_id);

// Si rien n'est revenu, on fait une erreur
if (!$article_id) {
    die("Attention ! L'article $article_id n'existe !");
}

// 3. Insertion du commentaire
insertComment($author, $content, $article_id);

redirect('article.php?id=' . $article_id);