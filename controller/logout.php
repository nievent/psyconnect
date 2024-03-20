<?php 
session_start();    
$_SESSION['psicologo'] = null;
$_SESSION['paciente'] = null;
session_destroy();
header('location: ../index.php');
?>