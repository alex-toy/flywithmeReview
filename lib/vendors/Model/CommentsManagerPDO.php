<?php
namespace Model;
 
use \Entity\Comment;
 
class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $query = $this->dao->prepare('INSERT INTO comments SET id_article = :id, auteur = :auteur, contenu = :contenu, date = NOW()');
 
    $query->bindValue(':id', $comment->id_article(), \PDO::PARAM_INT);
    $query->bindValue(':auteur', $comment->auteur());
    $query->bindValue(':contenu', $comment->contenu());
 
    $query->execute();
 
    $comment->setId($this->dao->lastInsertId());
  }
 
  public function delete($idComment)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $idComment);
  }
 
  public function deleteFromNews($id_article)
  {
    $this->dao->exec('DELETE FROM comments WHERE id_article = '.(int) $id_article);
  }
 
  public function getListOf($id_article)
  {
    if (!ctype_digit($id_article))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
 
    $query = $this->dao->prepare('SELECT id, id_article, auteur, contenu, date FROM comments WHERE id_article = :id_article');
    $query->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
    $query->execute();
 
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    $comments = $query->fetchAll();
 
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }
 
    return $comments;
  }
  
  public function getValidatedComments($id_article)
  {
    if (!ctype_digit($id_article))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
 
    $query = $this->dao->prepare('SELECT id, id_article, auteur, contenu, date FROM comments WHERE id_article = :id_article AND validated = true');
    $query->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
    $query->execute();
 
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    $comments = $query->fetchAll();
 
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }
 
    return $comments;
  }
  
  public function getUnvalidatedComments($id_article)
  {
    if (!ctype_digit($id_article))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
 
    $query = $this->dao->prepare('SELECT id, id_article, auteur, contenu, date FROM comments WHERE id_article = :id_article AND validated = false');
    $query->bindValue(':id_article', $id_article, \PDO::PARAM_INT);
    $query->execute();
 
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    $comments = $query->fetchAll();
 
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }
 
    return $comments;
  }
 
  protected function modify(Comment $comment)
  {
    $query = $this->dao->prepare('UPDATE comments SET auteur = :auteur, contenu = :contenu WHERE id = :id');
 
    $query->bindValue(':auteur', $comment->auteur());
    $query->bindValue(':contenu', $comment->contenu());
    $query->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
 
    $query->execute();
  }
 
  public function get($idComment)
  {
    $query = $this->dao->prepare('SELECT * FROM comments WHERE id = :id');
    $query->bindValue(':id', (int) $idComment, \PDO::PARAM_INT);
    $query->execute();
 
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
 
    return $query->fetch();
  }
  
  public function validateCommentWithId($id_comment)
  {
    if (!ctype_digit($id_comment))
    {
      throw new \InvalidArgumentException('L\'identifiant de la news passé doit être un nombre entier valide');
    }
 
    $query = $this->dao->prepare('UPDATE comments SET validated = true WHERE id = :id_comment;');
    $query->bindValue(':id_comment', $id_comment, \PDO::PARAM_INT);
    $query->execute();
  }
}

















