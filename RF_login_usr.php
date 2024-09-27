<?php require("conexion.php");

$con = conectar_bd();

if (isset($_POST["envio"])) {

    $email = $_POST["email"];
    $contrasenia = $_POST["pass"];

    // Llamada funcion login
    logear($con, $email, $contrasenia);
}



function traer_datos_usuario($con, $email){


    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($resultado);
    if(mysqli_num_rows($resultado)>0){
        return [

            'id' => $row['id_user'],
            'nombre' => $row['nombrecompleto'],
            'email' => $row['email'],
            'contrasenia' => $row['pass']
        ];

     } else{

            return null;
    }
    

}


function logear($con, $email, $contrasenia  ) {

    $datos_usr= traer_datos_usuario($con, $email);  

    session_start();

    $consulta_login = "SELECT * FROM usuarios WHERE email= '$email'";
    $resultado_login = mysqli_query($con, $consulta_login);

    if (mysqli_num_rows($resultado_login) > 0) {

        //se crea una variable con el objeto fetch asoc para acceder a las columnas que necesite
        $fila = mysqli_fetch_assoc($resultado_login);

        //asigno en una variable el campo pass de la BD...
        $password_bd = $fila["pass"];

        //uso la funcion password_verify para comparar lo que ingresa el usuario con lo que tengo en la BD.
        if (password_verify($contrasenia, $password_bd)) {
            
            //si todo es correcto inicio la sesion y redirijo a la pagina del usuario logueado
            $_SESSION["email"] = $email;
            $_SESSION["usuario"]= $datos_usr['nombre'];
            
            header("Location: home_usuario.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    }
}
