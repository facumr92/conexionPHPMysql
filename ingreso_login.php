<?php require("header.php"); ?>


    <form action="RF_login_usr.php" method="POST">


    <label for="email">Email</label>
        <input type="text" name="email" id="email">


    <label for="pass">Pass</label>
        <input type="password" name="pass" id="pass">

    <input type="submit" value="Ingresar" name="envio">
    <input type="reset" value="Cancelar">

    <script src="app.js"></script>
    </form>

<?php require("footer.php"); ?>