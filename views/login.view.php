<?php $title = "Connexion"; ?>
<?php include('partials/_header.php'); ?>
<div id="main-content">
    <main class="container">
        <div class="jumbotron">
            <h1 class="text-center">Connexion</h1>
            <?php include('partials/_error.php')?>
            <form data-parsley-validate method="post" class="col-md-6 offset-md-3">
                <!-- pseudo field -->
                <div class="form-group">
                    <label class="control-label" for="identifiant">Pseudo ou Adresse email:</label>
                    <input type="text" class="form-control" name="identifiant" id="identifiant" data-parsley-minlenght="3" value="<?= get_input('identifiant') ?>" required="required"/> <br/>
                </div>
                <!-- password field -->
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe:</label>
                    <input type="password" class="form-control" name="password" id="password" required="required"/> <br/>
                </div>

                <!-- remember me field -->
                <div class="form-group">
                    <label class="control-label" for="remember_me">
                        <input type="checkbox" name="remember_me" id="remember_me" />
                        Garder ma session active
                    </label>
                </div>

                <input type="submit" class="btn btn-primary col-md-4 offset-md-4" name="login" value="Connexion"/>
            </form>
        </div>
    </main><!-- /.container -->
</div>
<?php include('partials/_footer.php'); ?>
