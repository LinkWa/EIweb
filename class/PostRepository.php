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
      $datenow = new DateTime('now');

      $response = $this->base->prepare('INSERT INTO post (title, content, postDate) VALUES(:title, :content, :postDate)');
      $response->bindValue(':title', $post->getTitle());
      $response->bindValue(':content', $post->getContent());
      $response->bindValue(':postDate', $datenow->format('Y-m-d H:i:s'), PDO::PARAM_STR);


      $response->execute();

      $user->hydrate(['id' => $this->base->lastInsertId()]);
  }

?>
