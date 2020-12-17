<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        html{
            background-color:grey;
        }
        
        nav{
            display:flex;
            justify-content:space-around;
            width:100%;
            background-color:black;
            height:10vh;
            align-items:center;
            margin-bottom:25px;
        }

        a{
            width:15vw;
            height:10vh;
            color:white;
        }

        header{
            text-align:center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Fran's TODO</h1>
    </header>
    <nav>
        <div><a id="login" href="/login">Login</a></div>
        <div><a id="register" href="/register">Register</a></div>
        <?php 
            use App\Session;
            if(Session::get('email') != null){
                echo "<div><a id='cerr_sess' href='".BASE."logout/logout'>Cerrar sesion</a></div>";
            }
        ?>
        <div><a id="tareas" href="<?=BASE;?>dashboard">Ver tareas</a></div>
    </nav>
</body>
</html>