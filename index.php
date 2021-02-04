<?php 

    
?>
<?php include 'modelos\header.php';  ?><br><br><br>

<h4 class="title__carnes">Tipo de Carnes!!</h4>
<div class="container__details_carnes">
    <div class="rows_details">
                    <?php foreach($carnes as $carne){?>
                        <div class="array_container_carnes">
                            <div class="container_title">
                                <div class="container_centro">
                                    <h6><?php echo htmlspecialchars($carne["name"])  ?></h6>
                                    <h6><?php echo htmlspecialchars($carne["email"])  ?></h6>
                                    <h6><?php echo htmlspecialchars($carne["telefono"])  ?></h6>
                                    <h6><?php echo htmlspecialchars($carne["una_libra"])  ?></h6>
                                    <h6><?php echo htmlspecialchars($carne["media_libra"])  ?></h6>
                                    <h6><?php echo htmlspecialchars($carne["cuarto_de_libra"])  ?></h6>
                                    <h6><?php echo htmlspecialchars($carne["cantidad"])  ?></h6>
                                    <h6><?php echo htmlspecialchars($carne["comentarios"])  ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php }?>
    </div>
</div>




<h1 style="position: relative;">end post</h1>
