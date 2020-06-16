<?php $title = "Inscription"; ?>
<?php include('partials/_header.php'); ?>
<div id="main-content">
    <main class="container">
        <div class="jumbotron">
            <h1 class="text-center">Devenez dès à présent membre!</h1>
            <?php include('partials/_error.php')?>
            <form data-parsley-validate method="post" class="col-md-6 offset-md-3">
                <!-- Name field -->
                <div class="form-group">
                    <label class="control-label" for="name">Nom:</label>
                    <input type="text" value="<?= get_input('name') ?>" class="form-control" name="name" id="name" required="required"/> <br/>
                </div>
                <!-- pseudo field -->
                <div class="form-group">
                    <label class="control-label" for="pseudo">Pseudo:</label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" data-parsley-minlenght="3" value="<?= get_input('pseudo') ?>" required="required"/> <br/>
                </div>
                <!-- Email field -->
                <div class="form-group">
                    <label class="control-label" for="email">Adresse Email:</label>
                    <input type="email" class="form-control" name="email" id="email" data-parsley-trigger="keypress" value="<?= get_input('email') ?>" required="required"/> <br/>
                </div>
                <!-- password field -->
                <div class="form-group">
                    <label class="control-label" for="password">Mot de passe:</label>
                    <input type="password" class="form-control" name="password" id="password" required="required"/> <br/>
                </div>
                <!-- password confirmation field -->
                <div class="form-group">
                    <label class="control-label" for="password_confirm">Confirmer votre mot de passe:</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" required="required" data-parsley-equalito="#password"/> <br/>
                </div>
                <input type="submit" class="btn btn-primary col-md-4 offset-md-4" name="register" value="Inscription"/>
            </form>
        </div>
    </main><!-- /.container -->
</div>
<?php include('partials/_footer.php'); ?>
