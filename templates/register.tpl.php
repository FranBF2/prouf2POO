<?php
include 'header.tpl.php';
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=BASE;?>public/register.css">
</head>
<body>
    <form action="<?=BASE;?>register/reg" method="post" name="registerForm">
        <h1>Sign UP!</h1>
        <input type="text" name="username" placeholder="Name:" />
        <input type="email" name="email" placeholder=" e-mail:" />
        <input type="password" name="pass" placeholder=" Password:"/>
        <input  type="submit" value="Submit"/>
    </form>
</body>
</html>
<?php
include 'footer.tpl.php';