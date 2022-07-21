<?php 

class city_view
{

private $city_list;
public function get_city($city)
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


}

 ?>