<?php 
if(isset($_POST["submit"])){
    $conn = mysqli_connect("localhost", "javier", "ninja_pizza", "munchies");
    if (!$conn) {
            echo "error conection" . mysqli_connect_error();
    }
    /* QUERY PARA CARNES */
    $timestamp = date("Y-m-d H:i:s");
    $sql = 'INSERT INTO ordenes values(null, "'.$_POST["nombre"].'", "'.$_POST["telefono"].'", "direccion", "'.$timestamp.'", 22000 ,"'.$timestamp.'")';
    mysqli_query($conn, $sql);
    $id = mysqli_insert_id($conn);
    foreach($_POST['orden'] as $presentacion_id => $cantidad){
        $sql = 'INSERT INTO orden_productos values(null,  '.$presentacion_id.', '.$cantidad.', '.$id.')';
        mysqli_query($conn, $sql);
    }
}

/* VARIABLES DE ARRAYS  (LABEL Y ERROR)....*/
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


/* OBTENIENDO DATOS FORM */
    if(isset($_POST["submit"])){
        /* CHECK EMAIL */
        $labels["email"] = "*Escriba su email* <br>";
        if(empty($_POST["email"])){
            $labels["email"] = "Escriba su email* <br>";
        }else{
            $email = htmlspecialchars($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors["email"] = "Verificar que el email este bien";
            }
        }
        /* CHECK NOMBRE */
        $labels["nombre"] = "*Escriba su nombre* <br>";
        if(empty($_POST["nombre"])){
            $labels["nombre"] = "Escriba su nombre <br>";
            "Por favor escriba su nombre* <br>";
        }else{
            $nombre= htmlspecialchars($_POST["nombre"]);
            if(!preg_match("/^[a-zA-Z\s]+$/", $nombre)){
                $errors["nombre"] = "<br> Nombre solo debe ser letras y espacios!! <br>";
            }
        }
    
    /* CHECK TELEFONO */    
    $labels["telefono"] = " *Escriba su telefono* <br>"; 
    if(empty($_POST["telefono"])){
        $labels["telefono"] = " Escriba su telefono* <br>";
    }else{
        $telefono = htmlspecialchars($_POST["telefono"]);
        if(!preg_match("/^[0-9]+$/", $telefono)){
            $errors["telefono"] = "<br> Verifica que sean solo numeros!! <br>";
        }
    } 
    
    /* CHECK INGREDIENTES */
    $labels["ingredientes"] = "*Comentarios extras sobre su pedido* <br>";
    if(empty($_POST["ingredientes"])){
        $labels["ingredientes"] = "Comentarios extras sobre su pedido* <br>";
    }else{
        $ingredientes = htmlspecialchars($_POST["ingredientes"]);
        if(!preg_match("/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/", $ingredientes  ) ) {
            $errors["ingredientes"] = "<br>Por favor ponga ingredientes separados de commas!!"; 
        }else{
            $errors["ingredientes"] = "Por favor ponga ingredientes separados de commas"; 
        }
    }
    if(array_filter($errors)){
    }else{
        header("location: index.php");
    }



}//FINAL ISSET



//END OF THE POST
?>


    <div id="body__container">
        <!-- HEADER -->
        <?php include 'modelos\header.php';  ?>

        <!-- IMAGENES -->
        <div class="slider">
            <ul>
                <li><img src="images\img1.jpeg" class="img__slider">    </li>
                <li><img src="images\img2.jpeg" class="img__slider">    </li>
                <li><img src="images\img3.jpeg" class="img__slider">    </li>
                <li><img src="images\img4.jpeg" class="img__slider">    </li>
                <li><img src="images\img5.jpeg" class="img__slider">    </li>
                <li><img src="images\img6.jpeg" class="img__slider">    </li>
            </ul>
        </div>
        
        <!-- MENUNCHIES -->
        <div class="title__menunchies_h1"> <h1>MENUNCHIE'S!!</h1></div>
        <div class="container__model_menunchies"><?php include 'modelos\menunchies.php';  ?></div>

        <!-- IMAGEN LOGO DE FONDO -->
        <div class="img__logo_container"><img src="images\logo.jpeg" class="imagen_logo"alt=""></div>

        <!-- TITULO MUNCHIE'S COSTADO IZQUIERDO  -->
        <div class="title__munchies" ><h1>M <br> U<br>N<br>C<br>H<br>I<br>E<br>"<br>S</h1></div>

        <!-- TITULO MUNCHIE'S COSTADO DERECHO  -->
        <div class="title__munchies_2 flipH" ><h1>M <br> U<br>N<br>C<br>H<br>I<br>E<br>"<br>S</h1></div>

        <!-- FORM CLIENTE -->
        <div class="form__container__first">  <?php   include 'modelos\form.php';  ?> </div>

        <!-- FOOTER -->
        <div id="container__footer_b"> <?php include 'modelos\footer.php'; ?> </div>

    </div>
</body>

</html>