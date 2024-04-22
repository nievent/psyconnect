<?php
require '../../model/conexion.php';
require '../../model/paciente.php';
require '../../model/registro.php';
require '../../vendor/mail.php';

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



    // hacer el insert según el tipo de registro
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
            echo "no se ha podido realizar la asignación";
            break;
    }

    // Preparar y ejecutar la consulta SQL
    $stmt = $bdd->link->prepare($consulta);
    $stmt->bindParam(":id_registro", $last_registro);
    $fecha = date('Y-m-d');
    $stmt->bindParam(":fecha", $fecha);
    $stmt->execute();
    $resultado_busqueda = $paciente->buscarById($bdd->link);
    if($resultado_busqueda) {
        //se envia el mail.
        $nombre = $resultado_busqueda["nombre"];
        $apellidos = $resultado_busqueda["apellidos"];
        $email = $resultado_busqueda["email"];
        $subject = "nuevo registro asignado";
        $body = <<<HTML
        <div style="text-align: center;">
            <h2 style="font-size: 30px; font-weight: 700; color: #00daff; margin-top: 20px;">Saludos, {$nombre}! Su psicólogo le ha enviado un nuevo registro</h2>
            <p style="margin-bottom: 20px;">Acceda a la App para completarlo. Gracias por confiar en nosotros.</p>
        </div>
        
        <footer style="border-top: 5px solid #00daff; background-color: #e9faff; color: #343434; padding: 20px 0; text-align: center; position: relative; margin-top: 20px; font-family: Arial, Helvetica, sans-serif;">
        <div style="margin-bottom: 20px;">
                    <img src="http://localhost/psyconnect/psyconnect/view/img/logo-sin-fondo.png"
            alt="logo PsyConnect" style="max-width: 100px; height: auto; margin: 0 auto;">
            <p>Dirección: Av/ Santa María del Puig, 46132 Almássera.</p>
            <p>Teléfono: 625239672</p>
            <p>Email: <a href="mailto:nieves.98.nvv@gmail.com" style="color: #00daff; text-decoration: none;">contactos@psyconnect.com</a></p>
        </div>
        <p style="margin: 0; font-size: 12px; margin-top: 5px;">&copy; 2024 PsyConnect. Todos los derechos reservados.</p>
        <p style="margin: 0; font-size: 12px; margin-top: 5px; text-align: justify;">De conformidad con lo dispuesto en la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016, informamos que los datos personales serán incluidos en un fichero titularidad y responsabilidad de PsyConnect con la finalidad de posibilitar las comunicaciones a través del correo electrónico de la misma con los distintos contactos que ésta mantiene dentro del ejercicio de su actividad. Podrá ejercer los derechos de acceso, rectificación, supresión y  demás derechos reconocidos en la normativa mencionada, en la siguiente dirección: av/ Santa María del Puig, 46132 Almássera, o a través de la siguiente dirección de correo electrónico:  <a href="mailto:nieves.98.nvv@gmail.com">contactos@psyconnect.com</a>. Solicite más información al correo electrónico indicado. En virtud de la Ley 34/2002 de 11 de Julio de Servicios de la Sociedad de la Información y Correo Electrónico (LSSI-CE), este mensaje y sus archivos adjuntos pueden contener información confidencial, por lo que se informa de que su uso no autorizado está prohibido por la ley. Si ha recibido este mensaje por equivocación, por favor notifíquelo inmediatamente a través de esta misma vía y borre el mensaje original junto con sus ficheros adjuntos sin leerlo o grabarlo total o parcialmente. En caso de que sienta vulnerados sus derechos en lo concerniente a la protección de sus datos personales, especialmente cuando no haya obtenido satisfacción en el ejercicio de sus derechos, puede presentar una reclamación ante la Autoridad de Control en materia de Protección de Datos competente (Agencia Española de Protección de Datos), a través de su sitio web: <a href="https://www.aepd.es/">www.aepd.es</a>.</p>
        </footer>
        HTML;
        if(!sendMail($email, $nombre, $apellidos, $subject, $body)) {
            echo 'El correo electrónico no pudo ser enviado.';
            echo 'Error: ' . $mail->ErrorInfo;
        } else {
            header('location: ../../view/vistaPsicologo.php');
            exit(); 
        }
    }
}
?>
