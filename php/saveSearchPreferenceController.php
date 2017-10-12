<?php 

print_r($_POST);
$property_type = $_POST['property_type'][0];
header("location:".$_SERVER['HTTP_REFERER']."?".$property_type);

?>