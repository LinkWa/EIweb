<?php
  require __DIR__.'/header.php';
  use App\UserRepository;
?>

<?php
if (isset($_SESSION['id'])) {
    echo "Vous êtes déjà connecter";
} else {
    ?>
    <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
    <?php
}
?>

<?php
if (isset($_POST['email']) && isset($_POST['password'])) {

  $userRepository = new UserRepository($base);
  if ($userRepository->login($_POST['email'], $_POST['password'])) {
      echo "Vous etes connecter";
      header('Location: index.php');
  } else {
      echo "Vous n'avez pas de compte";
  }
}
 ?>
