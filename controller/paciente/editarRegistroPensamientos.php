<?php
require '../../model/conexion.php';
require '../../model/pensamientos.php';
require '../../model/paciente.php';
require '../../vendor/mail.php';
$bdd = new BD();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editableData'])) {
    $data = json_decode($_POST['editableData'], true);

    if (!empty($data)) {
        // Inicializar el array organizado
        $lastIdRegistro = $data[0]['id_registro'];
        $organizedData = [];
    
        // Variable para el contador de id_linea
        $idLineaCounter = 1;
    
        // Iterar sobre los datos recibidos
        foreach ($data as $row) {
            // Asignar el contador id_linea y luego incrementarlo
            $row['id_linea'] = $idLineaCounter++;
    
            // Agregar la fila al array organizado
            $organizedData[] = $row;
        }
    
        // Ahora $organizedData contiene los datos actualizados
        // Puedes procesarlos según tus necesidades
        // print_r($organizedData);
        // Borrar los registros correspondientes al lastIdRegistro
        Pensamientos::deleteById($bdd->link, $lastIdRegistro);
        
        // Iterar sobre los datos organizados para insertarlos en la base de datos
        foreach ($organizedData as $row) {
                // Crear un nuevo objeto Logros con los datos de la fila
                $pensamientos = new Pensamientos(
                        $row['id_registro'],
                        $row['id_linea'],
                        $row['cell_1'],
                        $row['cell_2'],
                        $row['cell_3'],
                        $row['cell_4'],
                        $row['cell_5']
                    );
                
                    // Insertar el nuevo registro en la base de datos
                    $pensamientos->insertar($bdd->link);
        }
        $paciente =  new Paciente ($_POST['id'], "", "", "", "", "", "" );
        $resultado = $paciente->getMailPsicologo($bdd->link); 
        if($resultado) {
            $nombre = $resultado ['nombre'];
            $email = $resultado ['email'];
            $subject = "nuevo registro completado";
            $body = <<<HTML
            <div style="text-align: center;">
                <h2 style="font-size: 30px; font-weight: 700; color: #00daff; margin-top: 20px;">Saludos, {$nombre}!</h2>
                <p style="margin-bottom: 20px;">Su paciente ha completado un registro de Pensamientos.</p>
                <p style="margin-bottom: 20px;">Acceda a la App de PsyConnect para revisarlo.</p>
                <p style="margin-bottom: 20px;">Pase un buen día.</p>
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
            if(!sendMail($email, $nombre, "", $subject, $body)) {
                echo 'El correo electrónico no pudo ser enviado.';
                echo 'Error: ' . $mail->ErrorInfo;
            } else {
                header('location: ../../view/vistaPaciente.php');
                exit(); // Detener la ejecución del script después de la redirección
            }
        }    
    } else {
        header('location:  ../../view/vistaPaciente.php?error=1');
    }
}
