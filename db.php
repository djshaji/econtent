<?php

$default_database = "mysql:host=localhost;dbname=shajisla_econtent" ;
$db = new PDO ($default_database, "shajisla_content", "iloveshajikhan");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>