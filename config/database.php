
<?php
$DB_HOST = "bmt6d21l2lvalxwtzw6e-mysql.services.clever-cloud.com";
$DB_NAME = "bmt6d21l2lvalxwtzw6e";
$DB_USERNAME = "uwbmnigylsvyg8aq";
$DB_PASSWORD='72lCQOrmwSoLp76FxUKG';

try{
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}

?>
