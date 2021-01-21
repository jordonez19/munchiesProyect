<div class="form__style_pizzaContent">
<form action="pizzaretos.php" method="post">


<fieldset>
<legend><span class="number">1</span> Escogiendo tu Pizza</legend>
<input type="text" name="campo1" placeholder="Nombre *">
<input type="number" name="campo2" placeholder="Telefono *">
<input type="email" name="campo3" placeholder="Email *">

<label for="job">Pizzas:</label>
<select  name="campo4">


<optgroup label="Pizzas de toda clase">
<option value="Tres carnes">Tres carnes</option>
<option value="Champiñones con pollo">Champiñones con pollo</option>
<option value="Camarones">Camarones</option>
<option value="Jamon y queso">Jamon y queso</option>
<option value="Hawaiana">Hawaiana</option>
<option value="Otra">Otra</option>
</optgroup>
<optgroup label="Pizzatarianas">
<option value="Solo Queso">Solo Queso</option>
<option value="Frutales">Frutales</option>
<option value="Moushrooms">Moushrooms</option>
<option value="Doble queso">Doble queso</option>
<option value="Brocoli con queso azul">Brocoli con queso azul</option>
<option value="Otra">Otra</option>
</optgroup>
</select>      
</fieldset>
<textarea name="field3"  placeholder="Tipo de pizza"></textarea>




<fieldset>
<legend><span class="number">2</span> Informacion Adicional</legend>
<textarea name="field3" placeholder="Comentarios extras"></textarea>
</fieldset>
<input type="submit" value="Ordenar" />
</form>
</div>


