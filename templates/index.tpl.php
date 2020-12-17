<?php
    include 'header.tpl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?=$title; use App\Session; echo"<br>".Session::get('email');?></h1>
</body>
</html>
<?php
    include 'footer.tpl.php';
?>