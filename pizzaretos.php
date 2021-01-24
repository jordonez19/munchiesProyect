

<?php 

$labels = array(
                "email"=>"",
                "nombre" =>"",
                "telefono"=>"",
                "ingredientes"=>"");

                
$errors= array(
                "email"=>"",
                "nombre" =>"",
                "telefono"=>"",
                "ingredientes"=>"");


        if(isset($_POST["submit"])){
        /*   echo htmlspecialchars($_POST["nombre"]);
            echo htmlspecialchars($_POST["telefono"]);
            echo htmlspecialchars($_POST["email"]); */






        /* CHECK EMAIL */
        $labels["email"] = "*Escriba su email* <br>";
        if(empty($_POST["email"])){

            $labels["email"] = "Escriba su email* <br>";}

        else{
         
            $email = htmlspecialchars($_POST["email"]);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

                $errors["email"] = "Verificar que el email este bien";
            }
        }

        /* CHECK NOMBRE */
        $labels["nombre"] = "*Escriba su nombre* <br>";
        if(empty($_POST["nombre"])){
            $labels["nombre"] = "Escriba su nombre <br>";
            "Por favor escriba su nombre* <br>";}
        else{
        
            $nombre= htmlspecialchars($_POST["nombre"]);
            if(!preg_match("/^[a-zA-Z\s]+$/", $nombre)){
            $errors["nombre"] = "<br> Nombre debe ser letras y espacios solamente!! <br>";
            }
        }}
        
        /* CHECK TELEFONO */


        
         $labels["telefono"] = " *Escriba su telefono* <br>"; 

        if(empty($_POST["telefono"])){
            $labels["telefono"] = " Escriba su telefono* <br>";}
        else{
        
            $telefono = htmlspecialchars($_POST["telefono"]);
            if(!preg_match("/^[0-9]+$/", $telefono)){
                $errors["telefono"] = "<br> Verifica que sean solo numeros!! <br>";
            }
        } 
    
        /* CHECK INGREDIENTES */
        $labels["ingredientes"] = "*Comentarios extras sobre su pedido* <br>";
        if(empty($_POST["ingredientes"])){
            $labels["ingredientes"] = "Comentarios extras sobre su pedido* <br>";}
        else{
            $ingredientes = htmlspecialchars($_POST["ingredientes"]);
            if(!preg_match("/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/", $ingredientes  ) ) {
                $errors["ingredientes"] = "<br>Por favor ponga ingredientes separados de commas!!"; 

            }else{
                $errors["ingredientes"] = "Por favor ponga ingredientes separados de commas"; 

            }
        }      

        
        //END OF THE POST




?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Monchis</title>

</head>


<body >
<?php include 'header.php';  ?>
<img src="images\logo.jpeg" class="imagen_logo"alt="">
<div class="title__pizzaretos" ><h1>M <br> U<br>N<br>C<br>H<br>I<br>E<br>"<br>S</h1></div>
<div class="title__pizzaretos_2 flipH" ><h1>M <br> U<br>N<br>C<br>H<br>I<br>E<br>"<br>S</h1></div>
<div class="form__container__first">
<?php include 'form.php';  ?>
</div>
<?php include 'footer.php';  ?>


</body>

</html>