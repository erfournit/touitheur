<?php
session_start();

require("includes/init.php");
require('filters/auth_filter.php');
require("config/database.php");
require("includes/functions.php");

if(!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')){
    if(!if_a_friend_request_has_already_been_sent(get_session('user_id'),$_GET['id'])){
    $id = $_GET['id'];

    $q = $db->prepare('INSERT INTO friends_relationships(user_id1, user_id2)
                        VALUES(:user_id1, :user_id2)');
    $q->execute([
        'user_id1' => get_session('user_id'), 
        'user_id2' => $id
    ]);

    set_flash('Votre demande d\'amitié a été envoyée avec succès!');
    redirect('profile.php?id='.$id);
    } else {
        set_flash('cet utilisateur vous a deja demander en amis');
        redirect('profile.php?id='.$_GET['id']);
    }
} else {
    redirect('profile.php?id='.getsession('user_id'));
}