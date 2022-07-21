<?php 


// it has some bugs 
// its perfect in mysql but when i add where dosent work
spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});

class search_personal
{

	private $fm;
	private $personal_ads;

	 function __construct()
	 {

	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads join  personal on ads.id=personal.id";

		$result= $mysql->query($sql_query);
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
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'type'=>$row['fm']);

			 $j+=1;
		}
		 $this->personal_ads=$ads;
	 }




	 public function search_personal_ads()
	 {
	 	return $this->personal_ads;
	 }


	 public function search_personal_f()
	 {
	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query= "select * from ads join personal on ads.id=personal.id where fm='female'";
		$result=mysqli_query($mysql,$sql_query);

		if (mysqli_num_rows($result)==0)
		{
			
			echo "not exist";
			exit();

		}

		$j=0;
		$ads;

		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{	

			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'type'=>$row['fm']);

			 $j+=1;
		}

		 return $this->personal_ads=$ads;
	 }





	 public function search_personal_m()
	 {
	 	$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$m='male';
		$sql_query="select * from ads join  personal on ads.id=personal.id where personal.f_m='".$m. "'";
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
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city'],'type'=>$row['f_m']);

			 $j+=1;
		}
		 $this->personal_ads=$ads; 
	 }
	 public function get_sub_cat()
	 {

	 	return $this->sub_cat;
	 }




}

// $obj=new search_personal();
// $obj->search_personal_f();
// $result=$obj->search_personal_ads();
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