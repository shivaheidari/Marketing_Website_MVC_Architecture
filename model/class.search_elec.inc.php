<?php 


spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});
class search_elec
{

	private $brand;
	private $biuld_year;
	private $elec_ads;
	private $sub_cat;


	 function __construct()
	 {

	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();

		$sql_query="select * from ads join  elec on ads.id=elec.id";
		$result= $mysql->query($sql_query);
		if (mysqli_num_rows($result)==0)
		{
			
			echo "not exist";
			exit();

		}



		$j=0;
		$ads;

		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'brand'=>$row['brand'],'biuld_year'=>$row['year']);

			 $j+=1;
		}
		 $this->elec_ads=$ads;
	 }
	 public function search_elec_ads()
	 {
	 	return $this->elec_ads;
	 }
	 public function search_elec_brand($brand)
	 {
	 	
	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads join  elec on ads.id=elec.id where brand='$brand'";

		$result= $mysql->query($sql_query);
		// var_dump(mysqli_num_rows($result));

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
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'brand'=>$row['brand'],'biuld_year'=>$row['year']);

			 $j+=1;
		}
		return $this->elec_ads=$ads;


	 }
	 public function search_elec_year($year)
	 {

	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads join  elec on ads.id=elec.id where elec.year=$year";
		$result= $mysql->query($sql_query);
		if (mysqli_num_rows($result)==0)
		{
			
			echo "not exist";
			exit();

		}

		$j=0;
		$ads;
		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'brand'=>$row['brand'],'biuld_year'=>$row['year']);

			 $j+=1;
		}
		 return $this->elec_ads=$ads;
	 }




}


// $obj=new search_elec();
// $obj->search_elec_brand('sony');
// $result=$obj->search_elec_ads();
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