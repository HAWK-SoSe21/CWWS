<?php
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
                $_SESSION["status"] = "Kein Benutzer mit dieser E-Mail gefunden";
                header('location: ../pages/userhelp.php');
                exit();
            } 
            else {
                //Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist 
                $passwortcode = $user->User_password;
                #$statement = $pdo->prepare("UPDATE users SET passwortcode = :passwortcode, passwortcode_time = NOW() WHERE id = :userid");
                #$result = $statement->execute(array('passwortcode' => sha1($passwortcode), 'userid' => $user['id']));
                
                $empfaenger = $user->User_email;
                $betreff = "CWWS-Account zurücksetzen"; 
                $from = "From: CWWS <maxvomberge@gmail.com>\n"; 
                $url_passwortcode = 'http://localhost/CWWS/resetaccount.php?userid='.$user->User_id.'&code='.$passwortcode; 
                $text = 'Hallo '.$user->User_name.',
                für deinen Account im CWWS wurde nach einem Rücksezungslink gefragt. Um deinen Account zurückzustzen, rufe 
                '.$url_passwortcode.' auf.
                
                
                
                Viele Grüße,
                dein CWWS-Team';
                
                mail($empfaenger, $betreff, $text, $from);
                
                 
                session_start();
                $_SESSION["status"] = "Ein Rücksetzungslink wurde an Ihre E-Mail versandt.";
                header('location: ../pages/userhelp.php');
            }
        }
    }
?>