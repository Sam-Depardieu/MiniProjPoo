<?php
require_once('libraries/models/Model.php'); 

class Comments extends Model{

    public function find(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id'); 
        $query->execute(['id' => $id]); 
         
        $comment=$query->fetch(); 
        return $comment; 
    }

    public function findAll(int $id) 
    { 
        $query = $this->pdo->query("SELECT * FROM comments WHERE article_id = " . $id); 
        $commentaires = $query->fetchAll(); 
     
        return $commentaires; 
    } 

    public function insert($author, $content, $article_id): void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(['author'=>$author, 'content'=>$content, 'article_id'=>$article_id]);
    }

    public function deleteComment(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM comments WHERE id = :id"); 
        // On exécute la requête en précisant le paramètre :article_id  
        $query->execute(['id' => $id]);
    }
}