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
        #form{
            text-align:center;
        }
    </style>
</head>
<body>
    <div id="form">
        <br><form action="<?=BASE;?>delete/delete" method="post">
            <input type="number" name="id"><br>
            <input type="submit" value="Enviar"><br>
        </form><br>
        <a href="<?=BASE;?>dashboard">Tareas</a><br><br>
        <a href="<?=BASE;?>update">Modificar</a><br><br>
        <a href="<?=BASE;?>index">Home</a>
    </div>
</body>
</html>
<?php
include 'footer.tpl.php';