<?php
session_start();
require_once("config/database.php");
$db = new Database();
$con = $db->conectar();

?>
<?php
if (isset($_POST["inicio"])) {
    $telefono = $_POST["phone"]; 
    $contra = $_POST["clave"];   

    $sql = $con ->prepare("SELECT * FROM user WHERE telefono = ? AND contrasena = ?") ;
    $sql -> execute([$telefono,$contra]);
    $fila = $sql -> fetch(); // fetchall todos o muchos fetch solo uno

    if ($fila){

        $_SESSION['doc_user'] = $fila ['dni'];
        $_SESSION['tipo'] = $fila ['id_tip_user'];
        
        
        if ($_SESSION['tipo']== 1) {
            header("location:model/instructor/index.php");
            
        }
        if ($_SESSION['tipo']== 2) {
            header("location:model/aprendiz/index.php");
            
        }
        if ($_SESSION['tipo']== 3) {
            header("location:model/transversal/index.php");
            
        }

    }

    else{
        echo '<script> alert("usuario no encontrado")</scritp>' ; 
    }

}
else{


}

?>