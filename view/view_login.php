<?php 
/**
 * 
 */
class view_login
{

	function  view_user($user_info)
	{

		// showes user info
	}
	function view_user_ads($user_ads)
	{
		// shows user ads
		foreach ($user_ads as $key => $value)
		 {
	      echo'<br>'.$key;
	      foreach ($value as $k => $v) 
	      {
		  echo '  '.$k.'=>'.$v;
		  }
	     }
	}

	function view_try()
	{
		echo 'try again';
	}


	
	
}




 ?>