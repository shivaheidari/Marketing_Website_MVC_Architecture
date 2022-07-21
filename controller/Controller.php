<?php 

include '../model/model_login.php';



$login = new model_login();
$result=$login->login('12003');
if ($row= $result->fetch_assoc())
{
	print("valid");
}
else{
	print("not valid");
}




 ?>