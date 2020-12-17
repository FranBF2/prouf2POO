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

        #php{
            display:flex;
            flex-direction:column;
            align-items:center;
        }

        table{
            border:1px solid black;
        }
        
        .id{
            width:20px;
            height:15px;
        }

        .cuerpo{
            width:500px;
            height:15px;
            border:1px solid black;
            background-color:white;
            
        }

        /*th{
            width:400px;
            height:15px;
            border:1px solid black;
        }*/



    </style>
</head>
<body>
    <div id="php">
    <?php 
        use App\Controllers\DashboardController;
        DashboardController::dash();
    ?>
    </div>
    <br><form action="/dashboard/insert" method="post">
        <input type="textarea" name="desc" placeholder="max 500 caraceteres">
        <input type="date" name="fecha">
        <input type="submit" value="Enviar">
    </form><br>
    <a href="/delete">Eliminar</a><br><br>
    <a href="/update">Modificar</a><br><br>
    <a href="/index">Home</a>
</body>
</html>
<?php
include 'footer.tpl.php';