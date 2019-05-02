<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Mon Blog</a>

    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION['id'])):?>
        <li class="nav-item active">
          <a class="nav-link" href="add_article.php">Ajouter un article</a>
        </li>
        <li class="nav-item active" style="margin-left:1000px;">
          <a class="nav-link" href="deconnection.php">Déconnection</a>
        </li>
      <?php else: ?>
      <li class="nav-item active">
        <a class="nav-link" href="inscrip.php">Inscription</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
    <?php endif ?>

    </ul>
  </nav>
