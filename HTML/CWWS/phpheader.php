<?php
define("WEBROOT", 'http://localhost/');
define("UV", '/CWWS/');//Unterverzeichnis wenn nicht direkt im htdocs-Ordner
define("UPLOADS_ROOT", WEBROOT . UV);
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . UV);
$GLOBALS["user"] = null;
session_start();

if(isset($_SESSION["userid"])){
    $GLOBALS["user"] = $_SESSION["userid"];
}

include_once ROOT.'/PHP/functions.inc.php';
include_once ROOT.'/PHP/dbh.inc.php';
include_once ROOT.'/PHP/helpers.inc.php';
