<?php
include 'header.tpl.php';
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=BASE;?>public/login.css">
</head>
<body>
    <div id="container" class="form-container">
        <form action="<?=BASE;?>login/log" autocomplete="off" method="post">
            <h1>Log in</h1>
	        <input class="username" type="text" name="email" placeholder="Email"><br />
	        <input class="password" type="password" name="pass" input="password" placeholder="**********"><br />
	        <input class="sign-in animated bounceIn" type="submit" value="Sign in">
        </form> 
    </div>
</body>
</html>
<?php
include 'footer.tpl.php';