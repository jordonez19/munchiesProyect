

<?php 


if(isset($_POST["submit"])){
    echo $_POST["nombre"];
    echo $_POST["telefono"];
    echo $_POST["email"];
}




?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Pizzaretos</title>

</head>


<body>
<?php include 'header.php';  ?>

<div class="title__pizzaretos" ><h1>P <br> I<br>Z<br>Z<br>A<br>R<br>E<br>T<br>O<br>S</h1></div>
<div class="title__pizzaretos_2 flipH" ><h1>P <br> I<br>Z<br>Z<br>A<br>R<br>E<br>T<br>O<br>S</h1></div>

<?php include 'form.php';  ?>

<?php include 'footer.php';  ?>


</body>

</html>