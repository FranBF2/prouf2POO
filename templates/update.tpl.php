<?php
include 'header.tpl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align:center;
        }

        #abajo{
            display:flex;
            justify-content:space-around;
            margin-top:30px;
        }
    </style>
</head>
<body>
    <br><form action="<?=BASE;?>update/update" method="post">
        <input type="number" name="id">
        <input type="textarea" name="desc" placeholder="max 500 caraceteres">
        <input type="date" name="fecha">
        <input type="submit" value="Enviar">
    </form><br>
    <div id="abajo">
        <a href="<?=BASE;?>delete">Eliminar</a>
        <a href="<?=BASE;?>dashboard">Ver tareas</a>
        <a href="<?=BASE;?>home">Home</a>
    </div>
</body>
</html>
<?php
include 'footer.tpl.php';