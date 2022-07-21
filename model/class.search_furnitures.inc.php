<?php 

spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});

class search_furnitures
{

	private $wooden;
	private $metal;
	private $furniture_ads;
	


	 function __construct()
	 {


	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads join  furniture on ads.id=furniture.id";
		$result= $mysql->query($sql_query);
		echo $mysql->error;
			if (mysqli_num_rows($result)==0)
		{
			$this->elec_ads=null;
			echo "e";
			exit();

		}
	

		$j=0;
		$ads;
		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'wooden'=>$row['wooden'],'metal'=>$row["metal"]);

			 $j+=1;
		}
		 $this->furniture_ads=$ads;

	 		
	 }
	 public function search_furnitures_ads()
	 {
	 	return $this->furniture_ads;
	 }
	 public function search_furnitures_wooden()
	 {
	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads join  furniture on ads.id=furniture.id where wooden=1";
		$result= $mysql->query($sql_query);
		echo $mysql->error;
		if (mysqli_num_rows($result)==0)
		{
			
			echo "not exist";
			exit();

		}
	

		$j=0;
		$ads;
		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'wooden'=>$row['wooden'],'metal'=>$row["metal"]);

			 $j+=1;
		}
		 return $this->furniture_ads=$ads;
	 }
	 public function search_furnitures_metal()
	 {
	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads join  furniture on ads.id=furniture.id where metal=1";
		$result= $mysql->query($sql_query);
		echo $mysql->error;
		if (mysqli_num_rows($result)==0)
		{
			
			echo "not exist";
			exit();

		}
	

		$j=0;
		$ads;
		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'wooden'=>$row['wooden'],'metal'=>$row["metal"]);

			 $j+=1;
		}
		return $this->furniture_ads=$ads;
	 	

	 }




}


// $obj=new search_furnitures();
// $obj->search_furnitures_metal();
// $result=$obj->search_furnitures_ads();
// if ($result==null)
// {
// 	echo "no result";
// 	exit();
// }
// foreach ($result as $key => $value)
//  {
// 	// echo $key;
// 	 echo'<br>'.$key;
//       foreach ($value as $k => $v) 
//     { 		  echo '  '.$k.'=>'.$v;
// 	}
// 	# code...
//  }


 ?>