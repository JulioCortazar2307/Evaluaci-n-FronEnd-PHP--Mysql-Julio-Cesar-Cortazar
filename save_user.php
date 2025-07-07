<?php
session_start();
require 'config/database.php';
$db = new Database();
$con = $db->conectar();


if(isset($_POST["save"])){
    $dni = $_POST['document'];
    $nombre= $_POST['names'];
    $telefono= $_POST['phone'];
    $profesion = $_POST['profesion'];
    $email = $_POST['email'];
    $contra = $_POST['contra'];
    $rol = $_POST['rol'];
    $lore = $_POST['desc_perfil'];

    $sql = $con-> prepare("SELECT * from user where dni = ? or correo = ?");
    $sql -> execute([$dni,$email]);
    $fila = $sql -> fetchAll();

    if($dni == "" || $nombre == "" || $telefono == "" || $profesion == "" || $email == ""|| $contra == ""|| $rol == ""|| $lore == ""){
      echo "<script>alert('Por favor rellene todos los campos');</script>";
      echo "<script>window.location='registrar_usuario.php'</script>";
    }
    elseif($fila){
      echo "<script>alert('usuario ya existente');</script>";
    }
    
    else{
     $sql = $con->prepare("INSERT INTO user (dni, nombres, telefono, correo, profesion, contrasena, descripcion, id_tip_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
     $sql -> execute([$dni,$nombre,$telefono,$email,$profesion,$contra,$lore,$rol]);
     echo "<script>alert('Usuario registrado exitosamente');</script>"; 
     echo "<script>window.location='index.php'</script>";
    }
  }


?>


