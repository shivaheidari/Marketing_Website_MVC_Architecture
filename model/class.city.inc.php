<?php 


spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});
class city
{
	private $cities;
	private $city_areas;

public function __construct()
{
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from cities ";
		$result=$mysql->query($sql_query);
		$city_array=array();
		while ($row=mysqli_fetch_array($result)) {

			array_push($city_array, $row['name']);
	
		}
		$this->cities=$city_array;

}

	public function get_cities()
	{

		return $this->cities;

	}
	public function get_area($city)
	{
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select name from areas where city_name= '$city'";

		$result=$mysql->query($sql_query);
		
		$areas=array();
		if (mysqli_num_rows($result)==0)
		{
			$this->elec_ads=null;
			echo "e";
			exit();

		}
		while ($row=mysqli_fetch_array($result))
		{
			array_push($areas, $row['name']);
		}

		$this->city_areas=$areas;
		return $this->city_areas;
	}


	public function set_city($city)
	{

	    $db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="insert into cities (name) VALUES ('$city')";
		$result=$mysql->query($sql_query);
		if ($result==TRUE)
		{
			echo "added";	
		}
		else
		{
			echo $mysql->error;
		}

     }



     public function set_areas($city,$area)
     {
     	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="insert into areas (name,city_name) VALUES ('$area','$city')";
		$result=$mysql->query($sql_query);
		if ($result==TRUE)
		{
			echo "added";	
		}
		else
		{
			echo $mysql->error;
		}
     }
}

// $obj=new city();

// $list=$obj->get_area('isfahan');
// foreach ($list as $key => $value) {
// 	echo $value.'<br>';

// }
	# code...

// $obj->set_areas('isfahan','sofeh');

 ?>