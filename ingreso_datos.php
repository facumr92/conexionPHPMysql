<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<form action="RF.php" method="POST">

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
</body>
</html>