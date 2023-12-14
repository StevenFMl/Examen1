<?php
require_once('../Models/cls_estacion.model.php');
$estacion = new Clase_Estacion;
    switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); 
        $datos = $estacion->todos(); 
        while ($fila = mysqli_fetch_assoc($datos)) { 
            $todos[] = $fila;
        }
        echo json_encode($todos); 
        break;
    case "uno":
        $ID_estacion = $_POST["ID_estacion"]; 
        $datos = array(); 
        $datos = $estacion->uno($ID_estacion); 
        $uno = mysqli_fetch_assoc($datos); 
        echo json_encode($uno); 
        break;

     case 'insertar':
        $Nombre = $_POST["Nombre"]; 
        $Ciudad = $_POST["Ciudad"];
        $Capacidad = $_POST["Capacidad"];
        $ID_estacion = $_POST["ID_estacion"];
            if ($Nombre !== null && $Ciudad !== null && $Capacidad !== null) {
                $datos = array();
                $datos = $estacion->insertar($Nombre, $Ciudad, $Capacidad);
                echo json_encode($datos);
            } else {
                // Manejo de error, por ejemplo, enviar un código de error HTTP
                http_response_code(400);
                echo json_encode(array("error" => "Faltan parámetros requeridos"));
            }
            break;
    case 'actualizar':
        $ID_estacion = $_POST["ID_estacion"];
        $Nombre = $_POST["Nombre"]; 
        $Ciudad = $_POST["Ciudad"];
        $Capacidad = $_POST["Capacidad"];
        $datos = array(); 
        $datos = $estacion->actualizar($ID_estacion, $Nombre, $Ciudad, $Capacidad); 
        echo json_encode($respuesta);
        echo json_encode($datos); 
        break;
        
        case 'eliminar':
            $ID_estacion = $_POST["ID_estacion"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
            $datos = array(); //defino un arreglo
            $datos = $estacion->eliminar($ID_estacion); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
            echo json_encode($datos); //devuelvo el arreglo en formato json
            break;
        }
        