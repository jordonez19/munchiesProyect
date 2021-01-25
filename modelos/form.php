

<div class="form__style_Content">
<form action="munchies.php" method="POST">


<fieldset>
<!-- #1 TITULO PRIMER NUMERO Y DATOS DEL CLIENTE -->
<legend><span class="number">1</span> Ordenando con Munchie's</legend>

<div class="form__container_detos">
        
        <div class="black-text"> <?php echo $labels["nombre"] ?>  </div>
        <div class="red-text"> <?php echo $errors["nombre"]. "<br>" ?>  </div>
        <input type="text" name="nombre" placeholder="Nombre *">

        <div class="black-text"> <?php echo $labels["telefono"] ?>  </div>
        <div class="red-text"> <?php echo $errors["telefono"]. "<br>" ?>  </div>
        <input type="text" name="telefono" placeholder="Telefono *">

        <div class="black-text"> <?php echo $labels["email"] ?>  </div>
        <div class="red-text"> <?php echo $errors["email"]. "<br>" ?>  </div>
        <input type="email" name="email" placeholder="Email *">
</div>
<!-- DATOS DEL PRODUCTO -->
<div class="input__form__container_checkbox">
        
        <label style="font-size:larger; font-weight:bold;">Munchie's Meats</label>
        <input class="input__form_checkBox" type="checkbox">  <b class="input__form_tipoDeCarne" >  Bacon </b>  </input><br>
        <input class="input__form_checkBox" type="checkbox">  <b class="input__form_tipoDeCarne" > Carne de res lomo  </b>  </input><br>
        <input class="input__form_checkBox" type="checkbox">  <b class="input__form_tipoDeCarne" > Carne de cerdo lomo  </b>  </input><br>
        <input class="input__form_checkBox" type="checkbox">  <b class="input__form_tipoDeCarne" >  punta de anca </b>  </input><br>
        <input class="input__form_checkBox" type="checkbox">  <b class="input__form_tipoDeCarne" > steak  </b>   </input><br>
        <input class="input__form_checkBox" type="checkbox">  <b class="input__form_tipoDeCarne" >  Otra </b>  </input>
</div>
</fieldset>



<!-- #2 SEGUNDO NUMERO INFORMACION ADICIONAL  -->

<div class="form__container_number2">
<legend><span class="number">2</span> Informacion Adicional</legend>
<div class="black-text"> <?php echo $labels["ingredientes"] ?>  </div>
<div class="red-text"> <?php echo $errors["ingredientes"]. "<br>" ?>  </div>
<textarea name=ingredientes" placeholder="Ingredientes"></textarea>
</div>

<input type="submit" name="submit"value="Ordenar" />
</form>
</div>


