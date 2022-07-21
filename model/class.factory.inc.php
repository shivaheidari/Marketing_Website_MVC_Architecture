<?php 


spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});




// revise it ............



abstract class abstract_factory
{
	abstract function create($ads);
}

class factory extends abstract_factory
{

	private $ads_type;
	function create($adstype)
	{
		switch ($adstype) {
			case 'elec':

				
				$this->ads_type=new elec;

				break;
				case 'personal':
				$this->ads_type=new personal;

				break;
				case 'furnitures':
				$this->ads_type=new furnitures;

				break;
		}
		return $this->ads_type;

	}
}


// $ob=new factory();
// $ads=$ob->create('elec');




 ?>
