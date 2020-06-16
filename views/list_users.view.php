<?php $title = "Liste des utilisateur"; ?>
<?php include('partials/_header.php'); ?>
<div id="main-content">
    <main class="container">
    <h1>Liste des utilisateurs</h1> 
    <?php foreach(array_chunk($users, 4) as $user_set): ?>
    <div class="row users">     
        <?php foreach($user_set as $user): ?>
            <div class="col-md-3 user-block">
                <a href="profile.php?id=<?= $user->id?>"><img src="<?= get_avatar_url($user->email,70) ?>" alt="<?= e($user->pseudo) ?>" class="avatar img-circle"></a>             
                <h4 class="user-block-username">
                    <a href="profile.php?id=<?= $user->id?>"><?= e($user->pseudo) ?></a>
                </h4>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
    <div id="pagination"><?= $pagination ?></div>
    </main><!-- /.container -->
</div>
<?php include('partials/_footer.php'); ?>

