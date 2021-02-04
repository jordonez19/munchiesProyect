<?php
/* DATABASE CONNECTION */
$conn = mysqli_connect("localhost", "javier", "ninja_pizza", "menunchies");
if (!$conn) {
    echo "error conection" . mysqli_connect_error();
}

