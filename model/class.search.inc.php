<?php 

spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});

class search
{


public function search_key($key)
{
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads where title like '%$key%' or description like '%$key%' ";
		$result=$mysql->query($sql_query);
		if(mysqli_num_rows($result)==0)
		{
			echo "not exist";
			exit();
		}
		$j=0;
		$ads;

		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city']);

			 $j+=1;
		}
		return $ads;

}




public function search_city($city)
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
		while ($row =mysqli_fetch_array($result))
		{	
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city']);

			 $j+=1;
		}
		return $ads;
}

public function search_date($date)
{


		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads where year like '%$date%'";
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
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area']);

			 $j+=1;
		}
		return $ads;


}
public function search_area($area)

{


		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from ads where area= '$area'";
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
			$ads[$j]= array('tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description'],'price'=>$row['price'],'date'=>$row['year'],'city'=>$row['city'],'area'=>$row['area'],'city'=>$row['city']);

			 $j+=1;
		}
		return $ads;

}

}

$obj=new search();
$result=$obj->search_key('laptop');
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