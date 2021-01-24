<div class="form__style_pizzaContent">
<form action="pizzaretos.php" method="POST">


<fieldset>
<legend><span class="number">1</span> Ordenando con Munchie's</legend>




<div class="black-text"> <?php echo $labels["nombre"] ?>  </div>
<div class="red-text"> <?php echo $errors["nombre"]. "<br>" ?>  </div>
<input type="text" name="nombre" placeholder="Nombre *">

<div class="black-text"> <?php echo $labels["telefono"] ?>  </div>
<div class="red-text"> <?php echo $errors["telefono"]. "<br>" ?>  </div>
<input type="text" name="telefono" placeholder="Telefono *">

<div class="black-text"> <?php echo $labels["email"] ?>  </div>
<div class="red-text"> <?php echo $errors["email"]. "<br>" ?>  </div>
<input type="email" name="email" placeholder="Email *">



<label style="font-size:larger; font-weight:bold;">Munchie's Meats</label>

<input class="input__form_checkBox" type="checkbox">Tres carnes</input>
<input class="input__form_checkBox" type="checkbox">Champiñones con pollo</input>
<input class="input__form_checkBox" type="checkbox">Camarones</input><br>
<input class="input__form_checkBox" type="checkbox">Jamon y queso</input>
<input class="input__form_checkBox" type="checkbox">Hawaiana</input>
<input class="input__form_checkBox" type="checkbox">Otra</input>
<!-- </optgroup> -->
<br>
<br>
<label style="font-size:larger; font-weight:bold;">Otros productos</label>
<input class="input__form_checkBox" type="checkbox">Solo Queso</input><br>
<input class="input__form_checkBox" type="checkbox">Frutales</input>
<input class="input__form_checkBox" type="checkbox">Moushrooms</input>
<input class="input__form_checkBox" type="checkbox">Doble queso</input>
<input class="input__form_checkBox" type="checkbox">Brocoli</input>

</optgroup>
</select>      
</fieldset>




<fieldset>
<legend><span class="number">2</span> Informacion Adicional</legend>


<div class="black-text"> <?php echo $labels["ingredientes"] ?>  </div>
<div class="red-text"> <?php echo $errors["ingredientes"]. "<br>" ?>  </div>
<textarea name=ingredientes" placeholder="Ingredientes"></textarea>


</fieldset>
<input type="submit" name="submit"value="Ordenar" />
</form>
</div>


