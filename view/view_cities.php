<?php 


spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});
class cities
{
	private $city_list;
	public function show_cities()
	{
		$model_obj=new city();
		$result=$model_obj->get_cities();
		foreach ($result as $key => $value) {
			echo "<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
			<a href='#' onclick='selection()' id='".$value."'>".$value."</a></body></head></html>";

		}



	}
}


if(isset($_post['action']))
{

	$city=$_post["city"];
    $obj=new cities();
    $obj->show_cities();
    $obj_search=new search();
    $result=$obj->search_city($city);
}


 ?>


 
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<script src="../js/jquery-3.1.0.min.js">
 		

 	</script>
 </head>
 <body>
 <script type="text/javascript">

 </script>
 </body>
 </html>