<?php 
session_start();
require_once("../config/database.php");
$db = new Database();
$con = $db->conectar();

?> 

<?php 
echo"hola aprendiz";
?> 