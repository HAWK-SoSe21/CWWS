<?php
//Autoren: Max Recke
    include_once '../phpheader.php';

    if(isset($_POST['submit']) ) {
        if(!isset($_POST['email']) || empty($_POST['email'])) {
            session_start();
            $_SESSION["status"] = "Bitte eine E-Mail-Adresse eintragen";
            header('location: ../pages/userhelp.php');
            exit();
        }   
        else {
            $email = $_POST["email"];
            $user=uidExists($email,$email);
    
            if($user === false) {
                session_start();
                $_SESSION["status"] = "Keinen Benutzer mit dieser E-Mail gefunden";
                header('location: ../pages/userhelp.php');
                exit();
            } 
            else {
                
                $passwordcode = $user->User_password;
                
                $empfaenger = $user->User_email;
                $betreff = "CWWS-Account zurücksetzen"; 
                $from = "From: CWWS <helpdesk@CWWWS.com>\n"; 
                $url_passwordcode = 'http://localhost/CWWS/pages/resetaccount.php?userid='.$user->User_name.'&code='.$passwordcode; 
                $text = 'Hallo '.$user->User_name.',
                für deinen Account im CWWS wurde nach einem Rücksezungslink gefragt. Um deinen Account zurückzustzen, rufe 
                '.$url_passwortcode.' auf.
                
                
                
                Viele Grüße,
                dein CWWS-Team';
                
                mail($empfaenger, $betreff, $text, $from);
                
                 
                session_start();
                $_SESSION["status"] = "Ein Rücksetzungslink wurde an Ihre E-Mail versandt.";
                $_SESSION["url_passwordcode"] = "{$url_passwordcode}";
                header('location: ../pages/userhelp.php');
            }
        }
    }
?>