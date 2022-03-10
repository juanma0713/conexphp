<?php
require "./Class/Product.php";


$product=new Product(6,"Samsumg G12",3);
$product->save();
echo"<br>";
$product->descripcion();