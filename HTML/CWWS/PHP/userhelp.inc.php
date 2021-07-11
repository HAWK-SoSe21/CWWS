<?php
    include_once '../phpheader.php';
    if(isset($_GET['send']) ) {
        if(!isset($_POST['email']) || empty($_POST['email'])) {
            $_SESSION["status"] = "Bitte eine E-Mail-Adresse eintragen";
            header('location: ../pages/userhelp.php');
            exit();
        }   
        else {
            $email = $_POST["email"];
            $result=uidExists($conn,$email,$email);
            $user = $statement->fetch(); 
    
            if($user === false) {
                $error = "<b>Kein Benutzer gefunden</b>";
            } 
            else {
                //Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist 
                $passwortcode = random_string();
                $statement = $pdo->prepare("UPDATE users SET passwortcode = :passwortcode, passwortcode_time = NOW() WHERE id = :userid");
                $result = $statement->execute(array('passwortcode' => sha1($passwortcode), 'userid' => $user['id']));
                
                $empfaenger = $user['email'];
                $betreff = "Neues Passwort für deinen Account auf www.php-einfach.de"; //Ersetzt hier den Domain-Namen
                $from = "From: Vorname Nachname <absender@domain.de>"; //Ersetzt hier euren Name und E-Mail-Adresse
                $url_passwortcode = 'http://localhost/passwortzuruecksetzen.php?userid='.$user['id'].'&code='.$passwortcode; //Setzt hier eure richtige Domain ein
                $text = 'Hallo '.$user['vorname'].',
                für deinen Account auf www.php-einfach.de wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
                '.$url_passwortcode.'
                
                Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.
                
                Viele Grüße,
                dein PHP-Einfach.de-Team';
                
                mail($empfaenger, $betreff, $text, $from);
                
                echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet."; 
                $showForm = false;
                }
            }
        }
    
    ?>