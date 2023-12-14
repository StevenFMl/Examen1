<?php
require_once('cls_conexion.model.php');
class Clase_Trenes
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena= "SELECT * FROM trenes JOIN estaciones ON trenes.ID_estacion = estaciones.ID_estacion";
           //$cadena = "SELECT trenes.ID_tren, trenes.Modelo, trenes.Capacidad_pasajeros, estaciones.Nombre FROM trenes JOIN estaciones ON trenes.ID_estacion = estaciones.ID_estacion";
           //$cadena=  "SELECT trenes.ID_tren, trenes.Modelo, trenes.Capacidad_pasajeros, estaciones.Nombre FROM trenes JOIN estaciones ON trenes.ID_estacion = estaciones.ID_estacion";
           //$cadena = "SELECT * FROM trenes JOIN estaciones ON trenes.ID_tren = estaciones.ID_estacion";
            $result = mysqli_query($con, $cadena);
            return $result;
            if (!$result) {
                die('Error en la consulta SQL: ' . mysqli_error($con));
            }
            
            while ($fila = mysqli_fetch_assoc($result)) {
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ID_tren)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `Trenes` WHERE ID_tren=$ID_tren";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Modelo,$Capacidad_pasajeros,$Fecha_fabricacion,$ID_estacion)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `Trenes`(`Modelo`,`Capacidad_pasajeros`,`Fecha_fabricacion`,ID_estacion) VALUES ('$Modelo','$Capacidad_pasajeros','$Fecha_fabricacion', $ID_estacion)";
            $result = mysqli_query($con, $cadena);
            return $result;
            $params = array(
                'Modelo' => $Modelo,
                'Capacidad_pasajeros' => $Capacidad_pasajeros,
                'Fecha_fabricacion' => $Fecha_fabricacion,
                'ID_estacion' => $ID_estacion,
                'result' => $result
            );
    
            return $params;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ID_tren, $ID_estacion,$Modelo,$Capacidad_pasajeros,$Fecha_fabricacion)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `Trenes` SET `Modelo`='$Modelo',`Capacidad_pasajeros`='$Capacidad_pasajeros',`Fecha_fabricacion`='$Fecha_fabricacion', `ID_estacion` =$ID_estacion WHERE `ID_tren`='$ID_tren'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ID_tren)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from trenes where ID_tren=$ID_tren";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }



}