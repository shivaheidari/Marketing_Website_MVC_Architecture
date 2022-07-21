<?php 

include '../model/class.user.inc.php';

include '../view/view_login.php';

/**
 * 
 */
class login
{	private $uid;
	private $login; 
	private $ads;
	
	public function __construct()
	{
		$this->login = new user(); 
	}

	public function profile($id)
	{
	    

	$validation=$this->login->validation($id);
	$user_view=new view_login();
	if ($validation==1)
	{
		
		$user_info=$this->login->get_user_info();
		$user_ads=$this->login->get_user_ads();

	    
		$user_view->view_user($user_info);
		$user_view->view_user_ads($user_ads);


	  }
	else
	{
		$user_view->view_try();
	}
	

	}
	
	
}



$user= new login();
$user->profile('123');


 ?>