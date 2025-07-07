<?php 
session_start();
require '../../config/database.php';
$db = new Database();
$con = $db->conectar();

?> 

<?php
if (isset($_GET['cerrar_sesion'])) {
    header("location:../../index.php");
    session_destroy();
    exit;
} 
?>

<html>
    <body>
        <h1>Hola <?php echo$_SESSION['nombre']; ?></h1>
        <br>
        <h2>Para salir presione el boton</h2>
        <form action="get">
            <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
        </form>
    </body>
</html>
