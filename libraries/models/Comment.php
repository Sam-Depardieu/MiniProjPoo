<?php

class Comments{

    public function find(int $id)
    {
        $pdo=getPdo(); 
        $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id'); 
        $query->execute(['id' => $id]); 
         
        $comment=$query->fetch(); 
        return $comment; 
    }

    public function findAll(int $id) 
    { 
        $pdo =getPdo(); 
        $query = $pdo->query("SELECT * FROM comments WHERE article_id = " . $id); 
        $commentaires = $query->fetchAll(); 
     
        return $commentaires; 
    } 

    public function insert($author, $content, $article_id): void
    {
        $pdo =getPdo(); 
        $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(['author'=>$author, 'content'=>$content, 'article_id'=>$article_id]);
    }

    public function deleteComment(int $id): void
    {
        $pdo =getPdo(); 
        $query = $pdo->prepare("DELETE FROM comments WHERE id = :id"); 
        // On exécute la requête en précisant le paramètre :article_id  
        $query->execute(['id' => $id]);
    }
}