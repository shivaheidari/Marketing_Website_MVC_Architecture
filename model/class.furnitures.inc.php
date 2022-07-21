<?php 
spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});
class furnitures extends ads
{
	private $wooden;
	private $metal;

	public function get_wooden()
	{
		return $this->wooden;
	}
	public function set_wooden(){

		 $this->wooden=1;
		 echo $this->wooden;

	}
	public function get_metal(){

		return $this->metal;
		echo $this->metal;

	}

	public function set_metal()
	{
		 $this->metal=1;
	}
	public function insert_ad()
	{
		parent::insert_ad();


			$db_c=new Connection();
	    	$db=$db_c::getinstance();
	    	$mysql=$db->getconnection();
	    	$sql_query="select max(id) as 'pk' from ads";
		    $result=$mysql->query($sql_query);
		    $row=mysqli_fetch_array($result);
		    $fk=$row['pk'];

		    $w=$this->wooden;
		    $m=$this->metal;
		    $sql_query="insert into furniture(id,metal,wooden) VALUES('$fk','$m','$w')";
		    $result=$mysql->query($sql_query);
		    if($result==true)
			{
			echo "successful";
			}
			else
			{
			echo "failed";
			echo $mysql->error;
			}
			 $sql_query="update ads set category='furnitures' where id=$fk";
			 		    $result=$mysql->query($sql_query);
		    if($result==true)
			{
			echo "successful";
			}
			else
			{
			echo "failed";
			echo $mysql->error;
			}

	}
	
}

// $fur_ob=new furnitures();
// // $ads_ob=new ads();
// $fur_ob->set_ad_tel("123400");
// $fur_ob->set_ad_category("furnitures");
// $fur_ob->set_ad_area("narmak");
// $fur_ob->set_ad_city("tehran");
// $fur_ob->set_ad_image("WWW.pic1.org");
// $fur_ob->set_ad_price("4400000");
// $fur_ob->set_ad_title("this is a table");
// $fur_ob->set_ad_descrption("wooden table");
// $fur_ob->set_ad_uid("123");
// $fur_ob->set_ad_year("1359");
// $fur_ob->set_wooden(1);
// $fur_ob->set_metal(1);
// print($fur_ob->insert_ad());

 ?>