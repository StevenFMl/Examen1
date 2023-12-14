<?php
require_once('../Models/cls_trenes.model.php');
$trenes = new Clase_Trenes;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); // defino un arreglo
        $datos = $trenes->todos(); // llamo al modelo de trenes e invoco al procedimiento todos y almaceno en una variable

        if ($datos) {
            $todos = array();
            while ($fila = mysqli_fetch_assoc($datos)) {
                $todos[] = $fila;
            }
            echo json_encode($todos);
        } else {
            echo json_encode(array('error' => 'Error en la consulta'));
        }
        break;
    case "uno":
        $ID_tren = $_POST["ID_tren"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $trenes->uno($ID_tren); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $ID_estacion = isset($_POST["ID_estacion"]) ? $_POST["ID_estacion"] : null;
        $Modelo = isset($_POST["Marca"]) ? $_POST["Marca"] : null;
        $Capacidad_pasajeros = isset($_POST["Capacidad_pasajeros"]) ? $_POST["Capacidad_pasajeros"] : null;
        $Fecha_fabricacion = $_POST["Fecha_fabricacion"];
        $datos = array(); //defino un arreglo
        $datos = $trenes->insertar($Modelo,$Capacidad_pasajeros,$Fecha_fabricacion, $ID_estacion); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $ID_tren = isset($_POST["ID_tren"]) ? $_POST["ID_tren"] : null;
        $ID_estacion = isset($_POST["ID_estacion"]) ? $_POST["ID_estacion"] : null;
        $Modelo = isset($_POST["Marca"]) ? $_POST["Marca"] : null;
        $Capacidad_pasajeros = isset($_POST["Capacidad_pasajeros"]) ? $_POST["Capacidad_pasajeros"] : null;
        $Fecha_fabricacion = isset($_POST["Fecha_fabricacion"]) ? $_POST["Fecha_fabricacion"] : null;
        $datos = array(); //defino un arreglo
        $datos = $trenes->actualizar($ID_tren, $ID_estacion, $Modelo, $Capacidad_pasajeros, $Fecha_fabricacion); //llamo al modelo de usuarios e invoco al procedimiento actual
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'eliminar':
        $ID_tren = $_POST["ID_tren"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $trenes->eliminar($ID_tren); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
}