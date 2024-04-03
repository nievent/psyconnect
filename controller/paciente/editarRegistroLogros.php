<?php
require '../../model/conexion.php';
require '../../model/logros.php';
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
        Logros::deleteById($bdd->link, $lastIdRegistro);
        
        // Iterar sobre los datos organizados para insertarlos en la base de datos
        foreach ($organizedData as $row) {
                // Crear un nuevo objeto Logros con los datos de la fila
                $logro = new Logros(
                        $row['id_registro'],
                        $row['id_linea'],
                        $row['cell_1'],
                        $row['cell_2'],
                        $row['cell_3'],
                        $row['cell_4'],
                        $row['cell_5']
                    );
                
                    // Insertar el nuevo registro en la base de datos
                    $logro->insertar($bdd->link);
        }
        header('location:  ../../view/vistaPaciente.php');     
    } else {
        header('location:  ../../view/vistaPaciente.php?error=1');
    }
}
