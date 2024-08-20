
<?php require("header.php")?>


<form action="RF_registro_usr.php" method="POST">

<label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">


<label for="apellido">Apellido</label>
    <input type="text" name="apellido" id="apellido">


<label for="email">Email</label>
    <input type="text" name="email" id="email">


<label for="pass">Pass</label>
    <input type="password" name="pass" id="pass">

<input type="submit" value="Cargar" name="envio">
<input type="reset" value="Cancelar">
<script src="app.js"></script>
</form>

<?php require ("footer.php"); ?>