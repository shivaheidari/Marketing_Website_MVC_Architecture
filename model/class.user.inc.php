<?php 


spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});


class user
{
	private $user_info;
	private $user_ads;
	

		

	public function validation($uid)
	{
		// $ads_ob = new ads();
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from user where user.uid=".$uid;
		$result= $mysql->query($sql_query);

		if (mysqli_num_rows($result)==0)
		{
			$this->elec_ads=null;
			echo "e";
			exit();

		}
		while ($row =mysqli_fetch_array($result))
		 {
			
			$this->user_info = array('id' => $row['uid'],'tel'=>$row['tel']);
			# code...
		}
		


	 return 1;

	}

	public function get_user_info()
	{
		
		return $this->user_info;
	}
	public function get_user_ads($uid)
	{
		
		$ads_ob=new ads();
		$this->user_ads=$ads_ob->get_ads($uid);
		return $this->user_ads;
	}

	public function set_user_info($user)
	{	

		// it can be improved
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="insert into user (tel) VALUES($user)";
		$result=$mysql->query($sql_query);
		if($result==true)
		{
			echo "successful";
		}

	}

	
}


// $ob=new user;
// $a=$ob->validation("123");
// $ads=$ob->get_user_ads("123");
// foreach ($ads as $key => $value)
// 		 {
// 	      echo'<br>'.$key;
// 	      foreach ($value as $k => $v) 
// 	      {
// 		  echo '  '.$k.'=>'.$v;}
// 	      }





 ?>