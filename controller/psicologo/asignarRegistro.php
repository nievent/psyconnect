<?php
require '../../model/conexion.php';
require '../../model/paciente.php';
require '../../model/registro.php';

$bdd = new BD();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idPaciente = $_POST["id_paciente"];
    $id_tipo_reg = $_POST["tipo_reg"];

    $registro = new Registro("", $id_tipo_reg, "", "");
    $registro->insertar($bdd->link);

    $ultimoRegistro = Registro::getLastRegistro($bdd->link);
    $datosRegistro = $ultimoRegistro->fetch(PDO::FETCH_ASSOC);
    $last_registro = $datosRegistro['id'];

    // Asignar registro al paciente
    $paciente = new Paciente($idPaciente, "", "", "", "", "", "");
    $paciente->asignarRegistro($bdd->link, $last_registro);

    // Realizar acciones según el tipo de registro
    switch ($id_tipo_reg) {
        case 1:
            // Insertar datos en la tabla relajacion_muscular
            $consulta = "INSERT INTO `relajacion_muscular` (`id_registro`, `id_linea`, `fecha`, `momento_dia`, `relajacion_conseguida`, `concentracion_conseguida`) VALUES (:id_registro, 1, :fecha, '', 0, 0)";
            break;
        case 2:
            // Insertar datos en la tabla pensamientos
            $consulta = "INSERT INTO `pensamientos` (`id_registro`, `id_linea`, `fecha`, `que_ha_sucedido`, `que_he_pensado`, `como_me_he_sentido`, `que_he_hecho`) VALUES (:id_registro, 1, :fecha, '', '', '', '')";
            break;
        case 3:
            // Insertar datos en la tabla estado_animo
            $consulta = "INSERT INTO `estado_animo` (`id_registro`, `id_linea`, `fecha`, `emociones`, `grado_intensidad`, `sensaciones_corporales`) VALUES (:id_registro, 1, :fecha, '', 0, '')";
            break;
        case 4:
            // Insertar datos en la tabla logros
            $consulta = "INSERT INTO `logros` (`id_registro`, `id_linea`, `fecha`, `que_he_logrado`, `acciones_realizadas`, `como_me_siento`, `premio_obtenido`) VALUES (:id_registro, 1, :fecha, '', '', '', '')";
            break;
        case 5:
            // Insertar datos en la tabla sensaciones_corporales
            $consulta = "INSERT INTO `sensaciones_corporales` (`id_registro`, `id_linea`, `fecha`, `ejercicio_provocador`, `numero_repeticion`, `miedo_maximo`) VALUES (:id_registro, 1, :fecha, '', 0, 0)";
            break;
        default:
            // Acción por defecto si no coincide con ningún caso
            break;
    }

    // Preparar y ejecutar la consulta SQL
    $stmt = $bdd->link->prepare($consulta);
    $stmt->bindParam(":id_registro", $last_registro);
    $fecha = date('Y-m-d');
    $stmt->bindParam(":fecha", $fecha);
    $stmt->execute();

    header("Location: ../../view/vistaPsicologo.php");
}
?>
