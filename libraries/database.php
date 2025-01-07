<?php 
/** 
 * Retourne une connexion à la base de données 
 *  
 */ 
function getPdo() { 
     
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [ 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ]); 
 
    return $pdo; 
 
}

function findAllArticles()  
{ 
    $pdo =getPdo(); 
    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC'); 
    // On fouille le résultat pour en extraire les données réelles 
    $articles = $resultats->fetchAll();     
 
    return $articles; 
} 

function findArticle(int $id) 
{ 
    $pdo =getPdo(); 
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id"); 
    // On exécute la requête en précisant le paramètre :article_id  
    $query->execute(['article_id' => $id]); 
 
    // On fouille le résultat pour en extraire les données réelles de l'article 
    $article = $query->fetch(); 
 
    return $article; 
} 

function deleteArticle(int $id): void
{
    $pdo =getPdo(); 
    $query = $pdo->prepare("DELETE FROM articles WHERE id = :article_id"); 
    // On exécute la requête en précisant le paramètre :article_id  
    $query->execute(['article_id' => $id]); 

}

function findComment(int $id)
{
    $pdo=getPdo(); 
    $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id'); 
    $query->execute(['id' => $id]); 
     
    $comment=$query->fetch(); 
    return $comment; 
}
function findAllComments(int $id) 
{ 
    $pdo =getPdo(); 
    $query = $pdo->query("SELECT * FROM comments WHERE article_id = " . $id); 
    $commentaires = $query->fetchAll(); 
 
    return $commentaires; 
} 

function insertComment($author, $content, $article_id): void
{
    $pdo =getPdo(); 
    $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(['author'=>$author, 'content'=>$content, 'article_id'=>$article_id]);
}

function deleteComment(int $id): void
{
    $pdo =getPdo(); 
    $query = $pdo->prepare("DELETE FROM comments WHERE id = :id"); 
    // On exécute la requête en précisant le paramètre :article_id  
    $query->execute(['id' => $id]);
}