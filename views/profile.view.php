<?php $title = "Page de Profile"; ?>
<?php include('partials/_header.php'); ?>
<div id="main-content">
    <main class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Profil de <?= e($user->pseudo) ?>(<?= friends_count() ?> ami<?= friends_count() == 1 ? '':'s'?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md5">
                                    <img src="<?= get_avatar_url($user->email,100) ?>" alt="Image de profile de <?= e($user->pseudo) ?>" class="img-circle">
                                </div>
                                <div class="col-md7">
                                    <?php if(!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')): ?>
                                        <?php include('partials/_relation_links.php') ?>
                                    <? endif; ?>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><?= e($user->pseudo) ?></strong><br>
                                    <?= e($user->sex) ?><br/>
                                    <a href="mailto:<?= e($user->pseudo) ?>"><?= e($user->email) ?></a><br/>
                                    <?= $user->city && $user->country ? '<i class="fas fa-location-arrow"></i>&nbsp;'. e($user->city) . ' - ' . e($user->country) . '<br/>' : '' ?>
                                    <a href="https://www.google.com/maps?q=<?= e($user->city) . ' ' . e($user->country) ?>" target="blank">voir sur Google Maps</a>
                                </div>
                                <div class="col-sm-6">
                                    <?= $user->sex == "H" ? '<i class="fas fa-male"></i>' : '<i class="fas fa-female"></i>'; ?>
                                    <?= $user->available_for_hiring ? 'Disponible pour emploi' : 'Non disponible pour emploi'; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 well">
                                    <h5>Biographie de <?= e($user->name) ?></h5>
                                    <P>
                                        <?= $user->bio ? nl2br(e($user->bio)) : "Aucune biographie" ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <?php if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>
                    <div class="status-post">
                        <form action="micropost" method="post" data-parsley-validate>
                            <div class="form-group">
                                <label for="content" class="sr-only">Statut :</label>
                                <textarea name="content" id="content" rows="3" class="form-control" placeholder="Alors quoi de neuf ?" required="required" data-parsley-minlegth="3" data-parsley-maxlength="140"></textarea>
                            </div>
                            <div class="form-group status-post-submit">
                                <input type="submit" name="publish" value="Publier">
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>

                    <?php if(count($microposts) != 0): ?>
                        <?php foreach ($microposts as $microposts): ?>
                            <?php include('partials/_micropost.php'); ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Cet utilisateur n'a encore rien poste pour le moment...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main><!-- /.container -->
</div>
<?php include('partials/_footer.php'); ?>

<!-- SCRIPTS -->
<script src="assets/js/jquery.timeago.js"></script>
<script src="assets/js/jquery.timeago.fr.js"></script>
<script type="text/javascript">
    windows.ParsleeyValidator.setLocale('fr');
    $(document).ready(function() {
        $(".timeago").timeago();
    });
</script>
