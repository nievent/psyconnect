<?php
class Estado_animo extends Registro {
    private $id_linea;
    private $fecha;
    private $emociones;
    private $grado_intensidad;
    private $sensaciones_corporales;

    function __construct($id_linea, $fecha, $emociones, $grado_intensidad, $sensaciones_corporales) {
        $this->id_linea = $id_linea;
        $this->fecha = $fecha;
        $this->emociones = $emociones;
        $this->grado_intensidad = $grado_intensidad;
        $this->sensaciones_corporales = $sensaciones_corporales;
    }

}