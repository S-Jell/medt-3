<?php
    
    $host ='localhost';
    $dbname='medt3';
    $user ='htluser';
    $pwd='htluser';
    
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pwd);
    } catch (PDOException $e) {
        exit("<p>System nicht verfügbar</p>");
    }
