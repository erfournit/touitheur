<?php
require("includes/init.php");
require('filters/guest_filter.php');
require('includes/functions.php');
require('config/database.php');
require('includes/constants.php');


    //si le formulaire a ete soumis
    if(isset($_POST['register'])){
        //si tout les champs on ete remplis
        if(not_empty(['name','pseudo','email','password','password_confirm'])){
            $errors = [];
            extract($_POST);
            if(mb_strlen($pseudo) < 3){
                $errors[] = "Pseudo trop court! (minimun 3 caracteres)";
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Adresse email invalide!";
            }
            if(mb_strlen($password) < 6){
                $errors[] = "Mot de passe trop court! (minimun 6 caracteres)";
            } else {
                if($password != $password_confirm){
                   $errors[] = "Les deux mots de passe ne concordent pas!"; 
                }
            }
            if(is_already_in_use('pseudo', $pseudo, 'users')){
                $errors[] = "Pseudo deja utilisé!";
            }
            if(is_already_in_use('email', $email, 'users')){
                $errors[] = "Email deja utilisé!";
            }
            if(count($errors) == 0){
                /*$to = $email;
                $subject = $WEBSITE_NAME." - ACTIVATION DE COMPTE";
                $password = sha1($password)
                $token = sha1($pseudo.$email.$password);

                ob_start();
                require('templates/emails/activation.tmpl.php');
                $content = ob_get_clean();

                $headers = 'NIME-Version: 1.0'."\r\n";
                $headers .='Content-type: text/html; charset=iso-8859-1'."\r\n";

                mail($to,$subject,$content,$headers);

                echo "Mail d'activation envoyer";*/
                
                $q = $db->prepare('INSERT INTO users(name, pseudo, email, password)
                                    VALUES(:name, :pseudo, :email, :password)');
                $q->execute([
                    'name' => $name,
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'password' => bcrypte_hash_password($password)
                ]);

                $id = $db->lastInsertId();
                $q = $db->prepare("INSERT INTO friends_relationships(user_id1, user_id2, status)VALUES(?, ?, ?)");

                $q->execute([$id, $id, '2']);

                redirect('index.php');
            } else {
                save_input_data();
            }

        } else {
            $errors[] = "Veuiller remplir tous les champs" ;
            save_input_data();
        }

    } else {
        clear_input_data();
    }
?>


<?php require('views/register.view.php'); ?>