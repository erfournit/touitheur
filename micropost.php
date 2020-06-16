<?php

session_start();

require("includes/init.php");
require('filters/auth_filter.php');
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');
require('partials/_flash.php');



if(isset($_POST['publish'])){

    if(!empty($_POST['content'])){
        extract($_POST);

        $q = $db->prepare('INSERT INTO microposts(content, user_id, created_at) VALUE(:content, :user_id, NOW())');
        $q->execute([
            'content' => $content,
            'user_id' => get_session('user_id')
        ]);

        set_flash('Votre statut a été mis à jour!');
    }
}

redirect('profile.php?id='.get_session('user_id'));