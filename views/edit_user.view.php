<?php $title = "Edition de Profile"; ?>
<?php include('partials/_header.php'); ?>
<div id="main-content">
    <main class="container">
        <div class="jumbotron">
            <div class="row">
                <?php if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')):?>
                <div class="col-md-6 offset-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Compléter mon profil</h3>
                        </div>
                        <div class="panel-body">
                            <?php include('partials/_error.php'); ?>
                            <form data-parsley-validate method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Prénom et nom<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" 
                                                    placeholder="John" value="<?= get_input('name') ?: e($user->name) ?>"
                                                    required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">Ville<span class="text-danger">*</span></label>
                                            <input type="text" name="city" id="city" value="<?= get_input('city') ?: e($user->city) ?>" class="form-control"
                                                    required="required" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Pays<span class="text-danger">*</span></label>
                                            <input type="text" name="country" id="country" value="<?= get_input('country') ?: e($user->country) ?>" class="form-control"
                                                    required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sex">Sexe<span class="text-danger">*</span></label>
                                            <select required="required" name="sex" id="sex" class="form-control">
                                                <option value="Z" selected>
                                                    ...
                                                </option>
                                                <option value="H" <?= $user->sex == "H" ? "selected" : "" ?>>
                                                    Homme
                                                </option>
                                                <option value="F" <?= $user->sex == "F" ? "selected" : "" ?>>
                                                    Femme
                                                </option>
                                                <option value="A">
                                                    Autre
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="available_for_hiring">
                                                <input type="checkbox" name="available_for_hiring" id="available_for_hiring" <?= $user->available_for_hiring ? "checked" : "" ?>>

                                            Disponible pour emploi?
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bio">Biographie<span class="text-danger">*</span></label>
                                            <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"
                                                        placeholder="php kessecé" required="required"><?= get_input('bio') ?: e($user->bio) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Valider" name="update"/>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>
<?php include('partials/_footer.php'); ?>