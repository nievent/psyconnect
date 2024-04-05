<?php
require '../../model/conexion.php';
require '../../model/estado_animo.php';
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
        Estado_animo::deleteById($bdd->link, $lastIdRegistro);
        
        // Iterar sobre los datos organizados para insertarlos en la base de datos
        foreach ($organizedData as $row) {
                // Crear un nuevo objeto Logros con los datos de la fila
                $estadoAnimo = new Estado_animo(
                        $row['id_registro'],
                        $row['id_linea'],
                        $row['cell_1'],
                        $row['cell_2'],
                        $row['cell_3'],
                        $row['cell_4']
                    );
                
                    // Insertar el nuevo registro en la base de datos
                    $estadoAnimo->insertar($bdd->link);
        }
        
        $paciente =  new Paciente ($_POST['id'], "", "", "", "", "", "" );
        $resultado = $paciente->getMailPsicologo($bdd->link); 
        if($resultado) {
            $nombre = $resultado ['nombre'];
            $email = $resultado ['email'];
            $subject = "nuevo registro completado";
            $body = "<p>¡Su paciente ha modificado su registro de Estado de Animo! Acceda a la app para revisarlo.</p>
        <p>Pase un buen día.</p>";
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

