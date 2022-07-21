<?php 
/**
 * has been deprricated................
 class.user.inc has been used
 cntroller . login
 */
spl_autoload_register(function ($class){

	include 'class.'.$class.'.inc.php';
});

class model_login
{
	private $user_info;
	private $user_ads;
	public function validation($uid)
	{
		$db_c=new Connection();
		$db=$db_c::getinstance();
		$mysql=$db->getconnection();
		$sql_query="select * from user where user.uid=".$uid;
		$result= $mysql->query($sql_query);
		if (!mysqli_fetch_array($result))
		{
			return 0;
		}
		while ($row =mysqli_fetch_array($result))
		 {
			
			$this->user_info = array('id' => $row['uid'],'tel'=>$row['tel']);
			# code...
		}

		$sql_query="select * from ads where uid =".$uid;
		$result= $mysql->query($sql_query);
		$j=0;
		while ($row =mysqli_fetch_array($result))
		{	
			$this->user_ads[$j]= array('id'=>$row['id'],'tel' => $row['tel'] , 'title'=>$row['title'],'description'=>$row['description']);

			 $j+=1;
		}
		




	 return 1;

	}
	public function get_user_info()
	{
		
		return $this->user_info;
	}
	public function get_user_ads()
	{
		
		return $this->user_ads;
	}

	public function set_user_info($user)
	{
			
	}

	public function set_ads($add)
	{


	}

	 
}
// $ob=new model_login();
// $out=$ob->validation('123');
// // print($out);
// $user=$ob->get_user_ads();
// var_dump($user);
// foreach ($user as $key => $value) {
// 	echo'<br>'.$key;
// 	foreach ($value as $k => $v) {
// 		echo '  '.$k.'=>'.$v;

		
// 	}
// }







 ?>