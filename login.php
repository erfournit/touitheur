<?php

session_start();

require("includes/init.php");
require('filters/guest_filter.php');
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');
require('partials/_flash.php');



    //si le formulaire a ete soumis
    if(isset($_POST['login'])){
        //si tout les champs on ete remplis
        if(not_empty(['identifiant','password'])){
            extract($_POST);

            $q = $db->prepare("SELECT id, pseudo, password AS hashed_password, email FROM users 
                                WHERE (pseudo = :identifiant OR email = :identifiant)
                                ");
            $q->execute([
                'identifiant' => $identifiant
            ]);

            $user = $q->fetch(PDO::FETCH_OBJ);

            if($user && bcrypte_verify_password($password, $user->hashed_password)){            
                
                $_SESSION['user_id'] = $user->id;
                $_SESSION['pseudo'] = $user->pseudo;
                $_SESSION['email'] = $user->email;

                //Si l'utilisateur a choisi de garder sa session active
                if(isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                   setcookie('pseudo', $user->pseudo, time()+3600*24*365, null, null, false, true);
                   setcookie('user_id', $user->id, time()+3600*24*365, null, null, false, true);
                   setcookie('avatar', $user->avatar, time()+3600*24*365, null, null, false, true);
                }

                redirect_intent_or('profile.php?id='.$user->id);
            } else {
                set_flash('Combinaison Identifiant/Password incorrecte', 'danger');
                save_input_data();
            }
        }
    } else {
        clear_input_data();
    }
?>


<?php require('views/login.view.php'); ?>