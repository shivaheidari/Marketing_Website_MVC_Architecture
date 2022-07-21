

<?php 

spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});
class personal extends ads
{
	
	private $fm;


	public function get_fm()
	{
		return $this->fm;
	}
	public function set_fm($fm)
	{
		$this->fm=$fm;
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
		    // insert into personal
		    $f_m=$this->fm;
		    $sql_query="insert into personal(id,f_m) VALUES('$fk','$f_m')";
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
			 $sql_query="update ads set category='personal' where id=$fk";
			 		    $result=$mysql->query($sql_query);

	}

	
}

// $per_ob=new personal();
// // $ads_ob=new ads();
// $per_ob->set_ad_tel("123400");
// $per_ob->set_ad_area("narmak");
// $per_ob->set_ad_city("tehran");
// $per_ob->set_ad_image("WWW.pic1.org");
// $per_ob->set_ad_price("4400000");
// $per_ob->set_ad_title("this is a picture");
// $per_ob->set_ad_descrption("beautifun picture of nature");
// $per_ob->set_ad_uid("123");
// $per_ob->set_ad_year("1399");
// $per_ob->set_fm(0);

// print($per_ob->insert_ad());


 ?>