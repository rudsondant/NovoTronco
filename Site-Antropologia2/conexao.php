
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED); 

$con = mysql_connect("localhost","root","");
$sql = mysql_select_db("museuvirtual",$con);

?>