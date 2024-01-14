<?php

$stmt=$connect->stmt_init();
$cod=1;
$query="select nombre from productos where id=?";
if(!($stmt->prepare($query))){
    echo "Se ha producido un error: " . $connect->error();
    die();
}
$stmt->bind_param('i', $cod);
if(!$stmt->execute()){
     //error
}