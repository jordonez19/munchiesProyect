

<?php 



        if(isset($_POST["submit"])){
        /*   echo htmlspecialchars($_POST["nombre"]);
            echo htmlspecialchars($_POST["telefono"]);
            echo htmlspecialchars($_POST["email"]); */

        /* CHECK EMAIL */

        if(empty($_POST["email"])){
        echo "Por favor escriba su email* <br>";}
        else{
        
            $email = htmlspecialchars($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Verificar que el email este bien";
            }
        }


        /* CHECK NOMBRE */

        if(empty($_POST["nombre"])){
        echo "Por favor escriba su nombre* <br>";}
        else{
        
            $nombre= htmlspecialchars($_POST["nombre"]);
            if(!preg_match("/^[a-zA-Z\s]+$/", $nombre)){
                echo "Nombre debe ser letras y espacios solamente <br>";
            }
        }}
        
        /* CHECK TELEFONO */

        if(empty($_POST["telefono"])){
        echo " Por favor escriba su telefono* <br>";}
        else{
        
            $telefono = htmlspecialchars($_POST["telefono"]);
            if(!preg_match("/^[0-9]+$/", $telefono)){
                echo "Verificar que sea solo numeros <br>";
            }
        } 
    
        /* CHECK COMENTARIOS */

        if(empty($_POST["ingredientes"])){
        echo "Por favor ponga ingredientes separados de commas* <br>";}
        else{
            $ingredientes = htmlspecialchars($_POST["ingredientes"]);
            if(!preg_match("/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)  *$/", $ingredientes  ) ) {
                
            }else{
                echo "Por favor ponga ingredientes separados de commas";
            }
        }      

        
        //END OF THE POST




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