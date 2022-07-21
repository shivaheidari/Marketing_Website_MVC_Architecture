<?php 

spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});

class filter
{
	private $ads_list;
	private $ids_ads;

	function __construct()
	{
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads ";
		$result=$mysql->query($sql_query);
		if(mysqli_num_rows($result)==0)
		{
			echo "not exist";
			exit();
		}
		$j=0;
		$ads;
		$ids;

		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city']);
			$ids[$j]=$row['id'];
			 $j+=1;
		}

		$this->set_ads_list($ads);
		$this->ids_ads=$ids;
		return $ads;
// put all ads here and $ads_list

	}

	private function get_ids()
	{
		return $this->ids_ads;
	}
	public function get_ads_list()
	{
		return $this->ads_list;

	}
	public function set_ads_list($ads)
	{

		$this->ads_list=$ads;
	}

	public function filter_ads_city($city)
	{
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads where city= '$city'";
		$result= $mysql->query($sql_query);
		if (mysqli_num_rows($result)==0)
		{
			
			echo "not exist";
			exit();

		}

		$j=0;
		$ads;
		$ids;
		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city']);

			 $j+=1;
			 $ids[$j]=$row['id'];
		}
		$this->ids_ads=array_intersect($ids,$this->ids_ads);
		$this->ads_list=$ads;
		

	}

	public function fitler_ads_category($cat)
	{
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads where category= '$cat'";
		$result= $mysql->query($sql_query);
		if (mysqli_num_rows($result)==0)
		{
			
			echo "not exist";
			exit();

		}


		$j=0;
		$ads;
		$ids;
		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city']);

			 $j+=1;
			 $ids[$j]=$row['id'];
		}
		echo "intersec";
		$this->ids_ads=array_intersect($ids,$this->ids_ads);
		$this->ads_list=$ads;
		




	}





}



$obj=new filter ();
$result=$obj->get_ads_list();
if ($result==0)
{
	echo "no result";
	exit();
}
foreach ($result as $key => $value)
 {
	// echo $key;
	 echo'<br>'.$key;
      foreach ($value as $k => $v) 
    { 		  echo '  '.$k.'=>'.$v;
	}
	# code...
 }

$obj->filter_ads_city('tehran');
echo ".................tehran......................";

$result=$obj->get_ads_list();
if ($result==0)
{
	echo "no result";
	exit();
}
foreach ($result as $key => $value)
 {
	// echo $key;
	 echo'<br>'.$key;
      foreach ($value as $k => $v) 
    { 		  echo '  '.$k.'=>'.$v;
	}
	# code...
 }



$obj->fitler_ads_category('');
echo ".................electronic.....................";

$result=$obj->get_ads_list();
if ($result==0)
{
	echo "no result";
	exit();
}
foreach ($result as $key => $value)
 {
	// echo $key;
	 echo'<br>'.$key;
      foreach ($value as $k => $v) 
    { 		  echo '  '.$k.'=>'.$v;
	}
	# code...
 }

 ?>