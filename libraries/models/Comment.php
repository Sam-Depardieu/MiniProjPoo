<?php
require_once('libraries/models/Model.php'); 

class Comments extends Model{

    protected $table="comments"; 

    public function findAllComments(int $id) 
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
}