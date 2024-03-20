<?php
require '../../model/registro.php';
require '../../model/conexion.php';
require '../../model/paciente.php';
$bdd = new BD();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idPaciente = $_POST["id_paciente"];
    $id_tipo_reg = $_POST["tipo_reg"];

    $registro = new Registro("", $id_tipo_reg, "", "");
    $registro->insertar($bdd->link);

    $ultimoRegistro = Registro::getLastRegistro($bdd->link);
    $datosRegistro = $ultimoRegistro->fetch(PDO::FETCH_ASSOC);

    $paciente = new Paciente($idPaciente, "", "", "", "", "", "");
    $paciente->asignarRegistro($bdd->link, $datosRegistro['id']);
    header("Location: ../../view/vistaPsicologo.php");
}