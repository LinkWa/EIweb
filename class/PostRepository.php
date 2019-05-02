<?php
namespace App;

use PDO;
use App\Post;

class PostRepository {

  private $base;

  public function __construct(PDO $base)
  {
      $this->base = $base;
  }

  public function add(Post $post)
  {


      $response = $this->base->prepare('INSERT INTO post (content, postDate) VALUES(:content, :postDate)');
      $response->bindValue(':content', $post->getContent());
      $response->bindValue(':postDate', $post->getPostDate());


      $response->execute();

      $post->setId($this->base->lastInsertId());
  }

  public function exists(Post $post)
 {
     $response = $this->base->prepare('SELECT COUNT(*) FROM post WHERE content = :content');
     $response->bindValue(':content', $post->getContent());
     $response->execute();

     return (bool) $response->fetchColumn();
 }
}

?>
