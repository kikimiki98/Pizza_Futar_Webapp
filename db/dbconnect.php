<!-- DB connect -->
<?php
require_once("config.php"); // db connect parameters
try {
    $connDB = new PDO(DBTYPE.":host=".DBHOST.";dbname=".DBNAME,DBUSER,DBPASSWORD);
    $connDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    $error = "Adatbázis kapcsolódási hiba: ".$e->getMessage();
}