
<?php 
// use post method 
// put the ajax request in view 
spl_autoload_register(function ($class){

	include '../model/class.'.$class.'.inc.php';
});
include "../view/view_filter.php";

class filter_ads
{
// {private $model_obj
	// private $view_obj=new view_filter();
	function __construct()
	{
		$model_obj=new filter();
		$ads=$model_obj->get_ads_list();
		$view_obj=new view_filter();
		$view_obj->show_ads($ads);


	}
	public function filter_city($city)
	{
		$model_obj=new filter();
		$view_obj=new view_filter();
		$model_obj->filter_ads_city($city);
		$ads=$model_obj->get_ads_list();
		$view_obj->show_ads($ads);

	}


	public function filter_category($cat)
	{
		$model_obj=new filter();
		$view_obj=new view_filter();
		$model_obj->filter_ads_city($city);
		$ads=$model_obj->get_ads_list();
		$view_obj->show_ads($ads);


	}

}


$obj=new filter_ads();
$obj->filter_city('tehran');


 ?>
