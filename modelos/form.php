<div class="form__style_Content">
        <form action="munchies.php" method="POST">
                <fieldset>
                        <!-- #1 TITULO PRIMER NUMERO Y DATOS DEL CLIENTE -->
                        <legend><span class="number">1</span> Ordenando con Munchie's</legend>
                        <div class="form__container_datos">
                                <!-- nombre -->
                                <div class="black-text"> <?php echo $labels["nombre"] ?> </div>
                                <div class="red-text"> <?php echo $errors["nombre"] . "<br>" ?> </div>
                                <input type="text" name="nombre" placeholder="Nombre *" required>
                                <!-- telefono -->
                                <div class="black-text"> <?php echo $labels["telefono"] ?> </div>
                                <div class="red-text"> <?php echo $errors["telefono"] . "<br>" ?> </div>
                                <input type="text" name="telefono" placeholder="Telefono *" required>
                                <!-- email -->
                                <div class="black-text"> <?php echo $labels["email"] ?> </div>
                                <div class="red-text"> <?php echo $errors["email"] . "<br>" ?> </div>
                                <input type="email" name="email" placeholder="Email *">
                                <!-- DATOS DEL PRODUCTO -->
                                <div class="input__form__container_checkbox">
                                        <label style="font-size:larger; font-weight:bold;">Munchie's Meats</label>
                                        <?php 
                                        /* DATABASE CONNECTION */
                                                $conn = mysqli_connect("localhost", "javier", "ninja_pizza", "munchies");
                                                if (!$conn) {
                                                        echo "error conection" . mysqli_connect_error();
                                                }
                                                /* QUERY PARA CARNES */
                                                $sql = 'SELECT id, nombre, descripcion FROM productos WHERE estado = 1;';
                                                $result = mysqli_query($conn, $sql); //make query and get results    
                                                $productos = mysqli_fetch_all($result, MYSQLI_ASSOC); //fetch resulting rows as an array    
                                                mysqli_free_result($result); //free results from memory    
                                                
                                                foreach ($productos as $producto) { ?>
                                                        <b class="input__form_tipoDeCarne"><?php echo $producto['nombre']; ?> </b><br>
                                                        <ul>
                                                                <?php 
                                                                        $sql = 'SELECT id, presentacion, precio FROM productos_presentacion WHERE producto_id = '.$producto['id'].' AND estado = 1 ;';
                                                                        $result = mysqli_query($conn, $sql);
                                                                        $presentaciones = mysqli_fetch_all($result, MYSQLI_ASSOC); //fetch resulting rows as an array    
                                                                        mysqli_free_result($result); //free results from memory   
                                                                        foreach ($presentaciones as  $presentacion) { ?>
                                                                                <li>
                                                                                        <?php echo $presentacion["presentacion"]; ?> -  $ <?php echo $presentacion["precio"]; ?>
                                                                                        <input type="number" name="orden[<?php echo $presentacion["id"]; ?>]" value="" required>
                                                                                </li>
                                                                        <?php } 
                                                                ?>
                                                        <ul>
                                                <?php }
                                                mysqli_close($conn);//close conection
                                        ?>
                                        
                                        <!--bacon -->
<!--                                         <input class="input__form_checkBox" type="checkbox" name="checkbox[]" value="bacon"> -->
                                        
                                </div>
                </fieldset>

                <!-- #2 SEGUNDO NUMERO INFORMACION ADICIONAL  -->
                <div class="form__container_number2">
                        <legend><span class="number">2</span> Informacion Adicional</legend>
                        <div class="black-text"> <?php echo $labels["ingredientes"] ?> </div>
                        <div class="red-text"> <?php echo $errors["ingredientes"] . "<br>" ?> </div>
                        <textarea name="ingredientes" placeholder="Ingredientes"></textarea>
                        <input type="submit" name="submit" value="Ordenar" />
                </div>
</div>
</form>
</div>