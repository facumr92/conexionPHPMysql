<?php

require("conexion.php");

$con= conectar_bd();
//comprobar que se envio un formulario por POST desde carga_datos
if(isset($_POST["envio"])){


    $nombre= $_POST["nombre"];
    $apellido= $_POST["apellido"];
    $email= $_POST["email"];
    $contrasenia= $_POST["pass"];
   
    insertar_datos($con, $nombre, $apellido, $email, $contrasenia);
}


function insertar_datos($con, $nombre, $apellido, $email, $contrasenia){



    $nombreCompleto= $nombre . ' '. $apellido;

    $consulta_insertar= "INSERT INTO usuarios(nombrecompleto, email, pass )  VALUES( '$nombreCompleto', '$email', '$contrasenia') ";

    if (mysqli_query($con, $consulta_insertar)) {
        

        consultar_datos($con);


  } else {
        echo "Error: " . $consulta_insertar . "<br>" . mysqli_error($con);
  }

}

function consultar_datos($con) {


    $consulta = "SELECT * FROM usuarios";
    
    $resultado = mysqli_query($con, $consulta);
   
    // Inicializo una variable para guardar los resultados
    $salida = "";
   
    //si se recupera algun registro de la consulta
    if (mysqli_num_rows($resultado) > 0) {

        //mientras haya registros..
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $salida .= "id: " . $fila["id_user"] . " - Nombre: " . $fila["nombrecompleto"] . " - Email: " . $fila["email"] . "<br> <hr>";
        }
    } else {
        $salida = "Sin datos ";
    }

    return $salida;
}


//puedo darle un formato a la salida

$salida= consultar_datos($con);
mysqli_close($con);   

echo $salida;
