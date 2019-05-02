<?php
  require __DIR__.'/header.php';
  use App\Post;
  use App\PostRepository;
?>

<form method="post">
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="">Comment</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Write your comment here" name="content">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php
  if(isset($_POST['title']) && isset($_POST['content'])){
    $date = new DateTime('now');
    $post = new Post();
    $post->setTitle($_POST['title']);
    $post->setContent($_POST['content']);
    $post->setPostDate($date->format('Y-m-d H:i:s'));

    $postrepository = new PostRepository($base);
    $postrepository->add($post);

    echo 'Votre post a été publié';
    }

?>
