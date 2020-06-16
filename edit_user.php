<?php
session_start();

require("includes/init.php");
require('filters/auth_filter.php');
require("config/database.php");
require("includes/functions.php");
require('includes/constants.php');


if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')){
    $user = find_user_by_id($_GET['id']);

    if(!$user){
        redirect('index.php');
    }

} else {
    redirect('profile.php?id='.get_session('user_id'));
}

if(isset($_POST['update'])){
    if(not_empty(['name','city','country','sex','bio'])) {
        extract($_POST);

        $q = $db->prepare('UPDATE users 
                            SET name = :name, 
                            city = :city, 
                            country = :country, 
                            sex = :sex, 
                            bio = :bio, 
                            available_for_hiring = :available_for_hiring 
                            WHERE id = :id');

        $q->execute([
            'name' => $name,
            'city' => $city,
            'country' => $country,
            'sex' => $sex,
            'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0',
            'bio' => $bio,
            'id' => get_session('user_id'),
        ]);
        set_flash("Votre profil a été mis à jour!");
        redirect('profile.php?id='.get_session('user_id'));
    }else {
        save_input_data();
        $error[] = "Veuillez remplir tous les champs marqués d'un (*)";
    }
} else {
    clear_input_data();
}

require("views/edit_user.view.php");