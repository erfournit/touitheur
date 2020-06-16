<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">touitheur</a>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav mr-auto">
      <li class="nav-item active"><a class="nav-link" href="list_users.php">Liste des utilisateurs</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <?php if( is_logged_in() ): ?>
        <div class="dropdown btn-group dropleft">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?= get_avatar_url(get_session('email')) ?>" alt="Image de profile de <?= get_session('pseudo') ?>" class="img-circle"><span class="caret"></span>
        </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
          <li class="<?= set_active('profile') ?>">
            <a class="dropdown-item" href="profile.php?id=<?= get_session('user_id') ?>">Profil</a>
          </li>
          <li class="<?= set_active('edit_user') ?>">
            <a class="dropdown-item" href="edit_user.php?id=<?= get_session('user_id') ?>">edit profil</a>
          </li>
          <li class="<?= set_active('logout') ?>">
            <a class="dropdown-item" href="logout.php">deconnexion</a>
          </li>
          </ul>
        </div>
      <?php else: ?>
        <li class="<?= set_active('login') ?>">
          <a class="nav-link" href="login.php">Connexion</a>
        </li>
        <li class="<?= set_active('register') ?>">
          <a class="nav-link" href="register.php">Inscription</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>