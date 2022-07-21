<?php 

/**
 * 
 */

spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});

class elec extends ads
{
	public $build;
	public $brand;


	public function get_build()
	{
		return $this->biuld;
	}

	public function get_brand()
	{
		return $this->brand;
	}


	public function set_build($year)
	{
		$this->build=$year;

	}
	public function set_brand($brand)
	{
		$this->brand=$brand;
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
		    // insert into elec
		    $build=$this->build;
		    $brand=$this->brand;
		    $sql_query="insert into elec(id,brand,year) VALUES('$fk','$build','$brand')";
		    $result=$mysql->query($sql_query);
		    if($result==true)
			{
			// echo "successful";
			}
			else
			{
			echo "failed";
			echo $mysql->error;
			}
			 $sql_query="update ads set category='elec' where id=$fk";
			 		    $result=$mysql->query($sql_query);
		    



	}

}

// $elec_ob=new elec();
// // $ads_ob=new ads();
// $elec_ob->set_ad_tel("123400");
// $elec_ob->set_ad_area("narmak");
// $elec_ob->set_ad_city("tehran");
// $elec_ob->set_ad_image("WWW.pic1.org");
// $elec_ob->set_ad_price("4400000");
// $elec_ob->set_ad_title("this is a picture");
// $elec_ob->set_ad_descrption("beautifun picture of nature");
// $elec_ob->set_ad_uid("123");
// $elec_ob->set_ad_year("1399");
// $elec_ob->set_build("2009");
// $elec_ob->set_brand("sony");

// print($elec_ob->insert_ad());


 ?>