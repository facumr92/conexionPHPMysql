<?php 

require("header.php");
require("validar_sesion.php");
?>


<main>

<h3>Bienvenido:<br> <?php echo $usr ?></h3>
<h5>Nombre de usuario: <?php echo $email ?></h5>
<a href="logout.php">Cerrar sesión</a><br>

<br>
<form id="form-buscar-usuario">
    <label for="usuario">
        Buscar usuario:
        <input type="text" name="usuario" id="usuario" placeholder="Ingrese el nombre a buscar" required>
        <input type="submit" value="Buscar" name="envio">
        <input type="reset" value="Cancelar">
    </label>
</form>

<div id="resultado"></div>
</main>
<?php require("footer.php"); ?>


