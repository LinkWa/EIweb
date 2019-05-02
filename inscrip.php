<?php
  require __DIR__.'/header.php';

  use App\User;
  use App\UserRepository;
 ?>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
  if(isset($_POST['email']) && isset($_POST['password'])) {
    $user = new User([
      'email' => $_POST['email'],
      'name' => $_POST['name'],
      'password' => password_hash($_POST['password'],PASSWORD_ARGON2I)
    ]);

    $userRepository = new UserRepository($base);

    if ($userRepository->exists($user) === false) {
          $userRepository->add($user);
          echo "Ajouter !";
      }
    else {
          echo "Un utilisateur du même nom existe";
        }
  }



?>
