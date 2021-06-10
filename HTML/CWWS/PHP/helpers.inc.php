<?php

    $dbName   = 'mydb';
    $host     = 'localhost';
    $userName = 'root';
    $password = '';

    try {
     global $dbName, $host, $userName, $password;
       $dsn = "mysql:local=" . $host . "; dbname=" . $dbName;
       $pdo = new PDO($dsn, $userName, $password);
    } catch (PDOException $ex) {
       die('Erreur : ' . $ex->getMessage());
    }


    function getDatas($req, $params = [])
    {
        global $pdo;
        $stmt = $pdo->prepare($req);
        $stmt->execute($params);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    function getData($req, $params = [])
    {
        global $pdo;
        $stmt = $pdo->prepare($req);
        $stmt->execute($params);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    function setData($req, $params = [])
    {
        global $pdo;
        $stmt = $pdo->prepare($req);
        return $stmt->execute($params);
    }
